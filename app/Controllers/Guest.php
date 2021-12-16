<?php

namespace App\Controllers;

class Guest extends BaseController
{

    // PAGE >> FORM LOGIN
    public function index()
    {
        session();
        if (isset($_SESSION['loggedIn']))
            return $this->food_cards();

        if (isset($_SESSION['finished']) && $_SESSION['finished'] == TRUE)
            return $this->finish();

        $_SESSION['curPage'] = 'login';

        echo view('layout/header');
        echo view('guest/login');
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> FOOD LIST
    public function food_cards()
    {
        session();
        if (!isset($_SESSION['loggedIn']))
            return $this->index();

        if ($_SESSION['finished'] == TRUE)
            return $this->finish();

        $_SESSION['curPage'] = 'food_cards';

        $model = new \App\Models\FoodModel();
        $data = $model->findAll();
        $pass = [
            'data' => $data
        ];

        if (!$data)
            $this->set_session_msg('yellow', '[WARNING] Data kosong.');

        echo view('layout/header');
        echo view('layout/navbar_guest');
        echo view('guest/food_cards', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> ORDER LIST
    public function order_list()
    {
        session();
        if (!isset($_SESSION['loggedIn']))
            return $this->index();

        if ($_SESSION['finished'] == TRUE)
            return $this->finish();

        $_SESSION['curPage'] = 'order_list';

        $model = new \App\Models\OrderModel();
        $data = $model->get_guest_order_list($_SESSION['guestId']);
        $pass = [
            'data' => $data
        ];

        if (!$data)
            $this->set_session_msg('green', 'Belum memesan apapun.');

        echo view('layout/header');
        echo view('layout/navbar_guest');
        echo view('guest/order_list', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> FOOD DETAIL
    public function food_cards_detail($id)
    {
        session();
        if (!isset($_SESSION['loggedIn']))
            return $this->index();

        if ($_SESSION['finished'] == TRUE)
            return $this->finish();

        $_SESSION['curPage'] = 'food_cards_detail';

        $model = new \App\Models\FoodModel();
        $row = $model->where('id', $id)->first();

        $pass = [
            'row' => $row
        ];

        echo view('layout/header');
        echo view('layout/navbar_guest');
        echo view('guest/food_cards_detail', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> FINISH (& LOOP SEQUENCE)
    public function finish()
    {
        session();
        if (!isset($_SESSION['loggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'finish';

        $id = $_SESSION['guestId'];

        $model = new \App\Models\OrderModel();
        $model->where('guest_id', $id);

        // First time finished check, if not finished do some first time checks
        if ($_SESSION['finished'] == FALSE) {

            $data = $model->findAll();

            // Check no order, logout immediately
            if ($data == NULL) {
                $modelB = new \App\Models\GuestModel();
                $modelB->delete($id);

                $this->int_logout();

                $this->set_session_msg('green', 'Pesanan kosong, tidak dipungut biaya.');
                return $this->index();
            }

            // Check served orders
            foreach ($data as $row) {
                if ($row['served'] == 'N') {
                    $this->set_session_msg('red', 'Masih terdapat pesanan yang belum dihidangkan!');
                    return $this->order_list();
                }
            }

            // Set client finished on client side n server side
            $_SESSION['finished'] = TRUE;

            $modelC = new \App\Models\GuestModel();
            $modelC->where('id', $id);
            $modelC->update($id, ['finished' => 'Y']);
        }

        // Loop checking
        $modelG = new \App\Models\GuestModel();
        $row = $modelG->where('id', $id)->first();
        // If payment confirmed, logout
        if ($row['bill_paid'] == 'Y') {
            $this->int_logout();

            return $this->index();
        }

        // View
        echo view('layout/header');
        echo view('layout/navbar_guest');
        echo view('guest/finish');
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // GUEST ORDER
    public function food_form_do_order()
    {
        session();
        if (!isset($_SESSION['loggedIn']))
            return $this->index();

        if ($_SESSION['finished'] == TRUE)
            return $this->finish();

        // Validation
        $rules = [
            'food_id' => 'required|integer',
            'amount' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            $this->set_session_msg('red', $this->validator->listErrors());
            return $this->food_cards_detail($this->request->getVar('food_id'));
        }

        $desc = $this->request->getVar('desc');
        if ($desc == NULL || $desc == '') $desc = '-';

        // Insert into table
        $model = new \App\Models\OrderModel();
        $model->insert_order(
            $_SESSION['guestId'],
            $this->request->getVar('food_id'),
            $this->request->getVar('amount'),
            $desc
        );

        $this->set_session_msg('green', 'Berhasil memesan.');

        return $this->response->redirect(site_url('guest/order_list'));
    }




    // LOGIN
    public function login()
    {
        session();
        $guest_name = $this->request->getVar('guest_name');
        $table_num = $this->request->getVar('table_num');

        // Validation
        $rules = [
            'guest_name' => 'required|min_length[1]',
            'table_num' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            $this->set_session_msg('red', $this->validator->listErrors());
            return $this->index();
        }

        // Check last session
        $model = new \App\Models\GuestModel();
        $model->where('table_num', $table_num);
        $model->where('bill_paid', 'N');
        $row = $model->first();

        if ($row != NULL) {
            $_SESSION['guestId'] = $row['id'];
            $_SESSION['loggedIn'] = TRUE;

            $this->set_session_msg('red', 'Perhatian!!! Terdeteksi pembayaran' .
                ' yang tidak tuntas pada nomor meja ini!' . '<br>' .
                '> Melanjutkan sesi sebelumnya pada nomor meja ini.' . '<br>' .
                '> ( Laporkan apabila ini adalah kesalahan. )');

            return $this->food_cards();
        }

        // Insert into table
        $modelB = new \App\Models\GuestModel();
        $data = [
            'guest_name' => $guest_name,
            'table_num' => $table_num,
            'finished' => 'N',
            'bill_paid' => 'N'
        ];
        $id = $modelB->insert($data, TRUE);

        $_SESSION['guestId'] = $id;
        $_SESSION['loggedIn'] = TRUE;
        $_SESSION['finished'] = FALSE;

        return $this->food_cards();
    }




    // INTERNAL FUNCTION LOGOUT
    function int_logout()
    {
        unset($_SESSION['guestId']);
        unset($_SESSION['loggedIn']);
        unset($_SESSION['finished']);
    }




    //INTERNAL FUNCTION
    function set_session_msg($color = '', $msg = '')
    {
        if (!$color && !$msg) unset($_SESSION['msg']);

        $_SESSION['msg'] = [
            'color' => $color,
            'desc' => $msg
        ];
    }
}

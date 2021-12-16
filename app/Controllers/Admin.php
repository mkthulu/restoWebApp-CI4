<?php

namespace App\Controllers;

class Admin extends BaseController
{

    // PAGE >> FORM LOGIN
    public function index()
    {
        session();
        if (isset($_SESSION['adminLoggedIn']))
            return $this->dashboard();

        $_SESSION['curPage'] = 'login';

        echo view('layout/header');
        echo view('admin/login');
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> DASHBOARD
    public function dashboard()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'dashboard';

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/dashboard');
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> FOOD LIST
    public function food_list()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'food_list';

        $model = new \App\Models\FoodModel();
        $data = $model->findAll();
        $pass = [
            'data' => $data
        ];

        if (!$data)
            $this->set_session_msg('yellow', '[WARNING] Data kosong.');

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/food_list', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> FOOD FORM
    public function food_form()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'food_form';

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/food_form');
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> ORDER LIST
    public function order_list()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'order_list';

        $model = new \App\Models\OrderModel();
        $data = $model->get_order_list();
        $pass = [
            'data' => $data
        ];

        if (!$data)
            $this->set_session_msg('yellow', '[WARNING] Data kosong.');

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/order_list', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> FOOD DETAIL
    public function food_list_detail($id)
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'food_detail';

        $model = new \App\Models\FoodModel();
        $row = $model->where('id', $id)->first();
        $pass = [
            'row' => $row
        ];

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/food_list_detail', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> GUEST LIST
    public function guest_list()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $_SESSION['curPage'] = 'guest_list';

        $model = new \App\Models\GuestModel();
        $data = $model->get_guest_list();

        $pass = [
            'data' => $data
        ];

        if (!$data)
            $this->set_session_msg('yellow', '[WARNING] Data kosong.');

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/guest_list', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // PAGE >> SETTINGS
    public function settings()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/settings');
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // FOOD UPDATE
    public function food_list_edit()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        // Validation
        $rules = [
            'id' => 'required|integer',
            'food_name' => 'required|min_length[2]|max_length[64]',
            'food_price' => 'required|decimal',
            'food_img' => 'max_size[food_img,512]|is_image[food_img]'
        ];

        $id = $this->request->getVar('id');

        if (!$this->validate($rules)) {
            $this->set_session_msg('red', $this->validator->listErrors());
            return $this->food_list_detail($id);
        }

        // Upload file if exist
        $filename = NULL;
        $file = $this->request->getFile('food_img');
        if ($this->upload_the_file($file) == 'ERROR') {
            return $this->food_list_detail($id);
        }

        $row = [
            'food_name' => $this->request->getVar('food_name'),
            'food_price' => $this->request->getVar('food_price')
        ];
        if ($filename != NULL) $row['food_img'] = $filename;

        $model = new \App\Models\FoodModel();
        $model->update($id, $row);

        $this->set_session_msg('green', 'Data berhasil diperbarui.');

        return $this->food_list();
    }




    // FOOD ADD
    public function food_form_add()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        // Validation
        $rules = [
            'food_name' => 'required|min_length[2]|max_length[64]',
            'food_price' => 'required|decimal',
            'food_img' => 'uploaded[food_img]|max_size[food_img,512]|is_image[food_img]'
        ];

        if (!$this->validate($rules)) {
            $this->set_session_msg('red', $this->validator->listErrors());
            return $this->food_form();
        }

        // Upload the file then verify if its exist
        $filename = NULL;
        $file = $this->request->getFile('food_img');
        if ($this->upload_the_file($file, TRUE) == 'ERROR') {
            return $this->food_form();
        }

        // Insert into table
        $row = [
            'food_name' => $this->request->getVar('food_name'),
            'food_price' => $this->request->getVar('food_price')
        ];
        $row['food_img'] = $filename;

        $model = new \App\Models\FoodModel();
        $model->insert($row);

        $this->set_session_msg('green', 'Data berhasil ditambahkan.');

        return $this->food_list();
    }




    // ORDER DETAIL
    public function order_list_detail($id)
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $model = new \App\Models\OrderModel();

        $row = $model->get_order_detail($id);
        $pass = [
            'row' => $row
        ];

        echo view('layout/header');
        echo view('layout/navbar_admin');
        echo view('admin/order_list_detail', $pass);
        echo view('layout/footer');

        $this->set_session_msg();
    }




    // ORDER SERVE
    public function order_form_action()
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $id = $this->request->getVar('id');

        $model = new \App\Models\OrderModel();
        $model->toggle_order_served($id);

        $this->set_session_msg('green', 'Status pesanan berhasil diubah.');

        return $this->response->redirect(site_url('admin/order_list'));
    }




    // GUEST PAY
    public function guest_list_do_pay($id)
    {
        session();
        if (!isset($_SESSION['adminLoggedIn']))
            return $this->index();

        $model = new \App\Models\GuestModel();
        $model->toggle_order_bill_paid($id);

        $this->set_session_msg('green', 'Status pembayaran berhasil diubah.');

        return $this->guest_list();
    }




    // LOGIN
    public function change_password()
    {
        session();
        $password_old = $this->request->getVar('password_old');
        $password_new = $this->request->getVar('password_new');

        // Validation
        $rules = [
            'password_old' => 'required|min_length[6]',
            'password_new' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            $this->set_session_msg('red', $this->validator->listErrors());
            return $this->settings();
        }

        $model = new \App\Models\AdminModel();
        $row = $model->where('id', 1)->first();
        if (!$row) {
            $this->set_session_msg('red', '[ERROR] Data admin tidak ditemukan!');
            return $this->settings();
        }

        if ($password_old == $password_new) {
            $this->set_session_msg('red', 'Gunakan kata sandi yang baru!');
            return $this->settings();
        }

        $password_auth = $row['password'];
        if (!password_verify($password_old, $password_auth)) {
            $this->set_session_msg('red', 'Kata sandi lama tidak cocok!');
            return $this->settings();
        }

        //Update table
        $data = [
            'password' => password_hash($password_new, PASSWORD_ARGON2ID)
        ];
        $model->update(1, $data);

        $this->set_session_msg('green', 'Password berhasil diperbarui!.');

        return $this->settings();
    }




    // LOGIN
    public function login()
    {
        session();
        $password = $this->request->getVar('password');

        $model = new \App\Models\AdminModel();
        $row = $model->where('id', 1)->first();
        if (!$row) {
            $this->set_session_msg('red', '[ERROR] Data admin tidak ditemukan!');
            return $this->index();
        }

        $password_auth = $row['password'];
        if (!password_verify($password, $password_auth)) {
            $this->set_session_msg('red', 'Kata sandi tidak cocok!');
            return $this->index();
        }

        $_SESSION['adminId'] = 1;
        $_SESSION['adminLoggedIn'] = TRUE;

        return $this->dashboard();
    }




    // LOGOUT
    public function logout()
    {
        session();
        unset($_SESSION['adminId']);
        unset($_SESSION['adminLoggedIn']);

        return $this->index();
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

    function upload_the_file($file, $mustUploaded = FALSE)
    {
        $filename = NULL;

        if (($file = $this->request->getFile('food_img')) != NULL) {
            if (!$file->isValid()) {
                $this->set_session_msg(
                    'red',
                    '[ERROR] Berkas upload tidak valid pada sisi server!'
                );
                return 'ERROR';
            }

            $filename = date('YmdHis') . $file->getName();
            if (!$file->move(ROOTPATH . 'public\images', $filename)) {
                $this->set_session_msg(
                    'red',
                    '[ERROR] Terdapat kesalahan dalam pemindahan berkas!'
                );
                return 'ERROR';
            }
        } else if ($mustUploaded) {
            $this->set_session_msg(
                'red',
                '[ERROR] Terdapat kesalahan saat membaca berkas!'
            );
            return 'ERROR';
        }
        return $filename;
    }
}

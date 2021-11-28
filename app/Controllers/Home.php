<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->request = service('request');
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->validator = \Config\Services::validation();
    }



    public function index()
    {
        return view('admin-create');
    }
    public function handleCreate()
    {
        $this->validator->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
            'category' => ['label' => ' category', 'rules' => 'required'],
            'image' => ['label' => 'image', 'rules' => 'uploaded[image]|is_image[image]'],
            'amount' => ['label' => 'amount', 'rules' => 'required'],
            'price' => ['label' => 'price', 'rules' => 'required'],
        ]);
        if(!$this->validator->withRequest($this->request)->run()){
            $this->session->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        } else {

            $file = $this->request->getFile('image');
            
            $file->move('./images',$file->getClientName());
            
            $builder = $this->db->table('items');
            $builder->insert([
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'image' => $file->getClientName(),
                'price' => $this->request->getPost('price'),
                'amount' => $this->request->getPost('amount'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            
            return redirect()->to(base_url('/admin-watch'));

        }

    }
    public function edit(){
        $id = $this->request->getPostGet('id');
        $builder = $this->db->table('items');
        $item = $builder->getWhere(['id' => $id]);
        $item = $item->getResult();
        return view('admin-edit',compact('item'));


    }
    public function watch(){
        $builder = $this->db->table('items');
        $items= $builder->get();
        return view('admin-watch', compact('items'));
    }
    public function handleDelete(){
        $id = $this->request->getPostGet('id');
        
        $builder = $this->db->table('items');
        $builder->delete(['id' => $id]);
        return redirect()->back();
    }

    public function handleEdit(){
        $id = $this->request->getPost('id');
        $item = $this->_getItem($id);
        
        $this->validator->setRules([
            'name' => ['label' => 'name', 'rules' => 'required'],
            'category' => ['label' => ' category', 'rules' => 'required'],
            'image' => ['label' => 'image', 'rules' => 'is_image[image]'],
            'amount' => ['label' => 'amount', 'rules' => 'required'],
            'price' => ['label' => 'price', 'rules' => 'required'],
        ]);
        if(!$this->validator->withRequest($this->request)->run()){
            $this->session->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        } else {
            if($this->request->getFile('image')){
                unlink("./images/$item->image");
                $this->request->getFile('image')->move('./images',$this->request->getFile('image')->getClientName());
                $file = $this->request->getFile('image')->getClientName();

            }else {
                $file = $item->image;
            }
            $builder = $this->db->table('items');
            $builder->update([
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'image' => $file,
                'price' => $this->request->getPost('price'),
                'amount' => $this->request->getPost('amount'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            return redirect()->to(base_url('/admin-watch'));



        }
    }
    private function _getItem($id){
        
        $builder = $this->db->table('items');
        $item = $builder->getWhere(['id' => $id]);
        $item = $item->getResult();
        return $item[0];
    }
    public function pesanan(){
       

        $builder = $this->db->table('user');
        $user = $builder->get();

        return view('admin-pesanan',compact('user'));

    }

    public function pesananDetail($id){
        $db = db_connect();
        $query = $db->query("SELECT pesanan.jumlah, pesanan.total_harga as total, pesanan.keterangan, user.username, user.nomeja, user.total_harga, user.is_served, items.name,items.image FROM pesanan JOIN user ON pesanan.id_user = user.id JOIN items ON pesanan.id_item = items.id WHERE user.id = $id");

        return view('admin-pesanan-detail',['items' => $query]);
    }
}

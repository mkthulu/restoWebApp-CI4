<?php

namespace App\Controllers;

use Faker\Core\Number;

class User extends BaseController
{
    public function __construct()
    {
        $this->request = service('request');
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->validator = \Config\Services::validation();
    }
    public function login()
    {
        return view('login');
    }
    public function watch()
    {
        $builder = $this->db->table('items');
        $items = $builder->get();
        return view('user-watch', compact('items') );
    }
    public function watchDetail($id){
        $builder = $this->db->table('items');
        $item = $builder->getWhere(['id' => $id]);
        return view('user-watch-detail', ['item' => $item->getResult()[0]]);
    }
    public function keranjang(){
        return view('user-keranjang');
    }
    public function handlePesan(){
        
        $json = $this->request->getJSON();
        

        

        $builderUser = $this->db->table('user');
        $dataUser = $builderUser->getWhere(['username' => $json->user,'nomeja' => $json->nomeja, 'is_served' => 'n']);
        
       

        if($dataUser->getResult() == []){

            $builderUser->insert([
                'username' => $json->user,
                'nomeja' => $json->nomeja,
                'total_harga' => $json->total
            ]);
            $dataUser = $builderUser->getWhere(['username' => $json->user,'nomeja' => $json->nomeja, 'is_served' => 'n']);
        } else {
           $data = [
               'username' => $json->user,
               'nomeja' => $json->nomeja,
               'total_harga' => (int) $dataUser->getResult()[0]->total_harga + (int) $json->total 
           ];
           $builderUser->where(['id' => $dataUser->getResult()[0]->id]);
           $builderUser->update($data);
           
        }

        
       

        $builderPesanan = $this->db->table('pesanan');
        foreach($json->pesanan as $pesanan)
        $builderPesanan->insert([
            'id_user' => $dataUser->getResult()[0]->id,
            'id_item' => $pesanan[0],
            'jumlah' => $pesanan[5],
            'total_harga' => $pesanan[4],
            'keterangan' => $pesanan[6],
            'created_at' => date('Y-m-d H:i:s')
        ]);





      return $this->response->setJSON(['success' => 'success']);  
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'guest_id', 'food_id', 'amount',
        'total', 'desc', 'served'
    ];
    protected $useTimestamps = TRUE;

    protected $dateFormat = 'datetime';

    protected $createdField = 'created_time';
    protected $updatedField = 'last_update_t';

    public function get_order_list()
    {
        $this->join('guests', 'guests.id = orders.guest_id', 'LEFT');
        $this->join('foods', 'foods.id = orders.food_id', 'LEFT');
        $this->select('orders.id AS id');
        $this->select('guests.table_num AS table_num');
        $this->select('foods.food_name AS food_name');
        $this->select('foods.food_img AS food_img');
        $this->select('orders.amount AS amount');
        $this->select('orders.desc AS desc');
        $this->select('orders.served AS served');
        $this->select('orders.created_time AS created_time');
        $this->orderBy('orders.id', 'DESC');
        $this->orderBy('orders.served', 'ASC');
        return $this->findAll();
    }

    public function get_guest_order_list($id)
    {
        $this->join('guests', 'guests.id = orders.guest_id', 'LEFT');
        $this->join('foods', 'foods.id = orders.food_id', 'LEFT');
        $this->select('orders.id AS id');
        $this->select('guests.table_num AS table_num');
        $this->select('foods.food_name AS food_name');
        $this->select('foods.food_img AS food_img');
        $this->select('orders.amount AS amount');
        $this->select('orders.desc AS desc');
        $this->select('orders.served AS served');
        $this->select('orders.created_time AS created_time');
        $this->orderBy('orders.id', 'DESC');
        $this->orderBy('orders.served', 'ASC');
        $this->where('guests.id', $id);
        return $this->findAll();
    }

    public function get_order_detail($id)
    {
        $this->join('guests', 'guests.id = orders.guest_id', 'LEFT');
        $this->join('foods', 'foods.id = orders.food_id', 'LEFT');
        $this->select('orders.id AS id');
        $this->select('guests.table_num AS table_num');
        $this->select('foods.food_name AS food_name');
        $this->select('foods.food_img AS food_img');
        $this->select('orders.amount AS amount');
        $this->select('orders.desc AS desc');
        $this->select('orders.served AS served');
        $this->select('orders.created_time AS created_time');
        return $this->where('orders.id', $id)->first();
    }

    public function toggle_order_served($id)
    {
        $data = [
            'served' => 'Y'
        ];
        $this->update($id, $data);
    }

    public function insert_order($guest_id, $food_id, $amount, $desc, $served = 'N')
    {
        $model = new \App\Models\FoodModel();
        $rowF = $model->where('id', $food_id)->first();
        $total = $rowF['food_price'] * $amount;

        $data = [
            'guest_id' => $guest_id,
            'food_id' => $food_id,
            'amount' => $amount,
            'total' => $total,
            'desc' => $desc,
            'served' => $served
        ];
        $this->insert($data);
    }
}

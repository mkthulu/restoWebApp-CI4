<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table      = 'guests';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['guest_name', 'table_num', 'finished', 'bill_paid'];
    protected $useTimestamps = TRUE;

    protected $dateFormat = 'datetime';

    protected $createdField = 'created_time';
    protected $updatedField = 'last_update_t';

    public function get_guest_list()
    {
        $this->join('orders', 'orders.guest_id = guests.id', 'LEFT');
        $this->select('guests.id AS id');
        $this->select('guests.guest_name AS guest_name');
        $this->select('guests.table_num AS table_num');
        $this->select('guests.created_time AS created_time');
        $this->select('guests.finished AS finished');
        $this->select('guests.bill_paid AS bill_paid');
        $this->selectSum('orders.total', 'order_bill');
        $this->orderBy('guests.id', 'DESC');
        $this->orderBy('guests.finished', 'ASC');
        $this->orderBy('guests.bill_paid', 'ASC');
        $this->groupBy('guests.id');
        return $this->findAll();
    }

    public function toggle_order_bill_paid($id)
    {
        $data = [
            'bill_paid' => 'Y'
        ];
        $this->update($id, $data);
    }
}

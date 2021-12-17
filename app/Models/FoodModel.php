<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    protected $table      = 'foods';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['food_name', 'food_price', 'food_img'];
    protected $useTimestamps = TRUE;

    protected $dateFormat = 'date';

    protected $createdField = 'created_at';
    protected $updatedField = 'last_update';
}

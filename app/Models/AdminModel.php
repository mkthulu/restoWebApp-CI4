<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['password'];

    protected $useTimestamps = TRUE;

    protected $dateFormat = 'date';

    protected $createdField = 'created_at';
    protected $updatedField = 'last_update';
}

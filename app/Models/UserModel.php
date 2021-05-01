<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'useraura';
    protected $primaryKey = 'UserId';
    protected $allowedFields = ['user', 'password', 'email', 'level', 'tipe'];
}

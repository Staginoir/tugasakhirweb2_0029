<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user','username', 'password', 'role', 'access_level', 'nis_siswa', 'id_guru', 'status'];
}

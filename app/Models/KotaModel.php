<?php
namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table = 'm_kota';
    protected $primaryKey = 'id_kota';
    protected $allowedFields = ['id_kota', 'nama_kota'];
}

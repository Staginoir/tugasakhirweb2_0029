<?php
namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $table = 'm_bidang';
    protected $primaryKey = 'id_bidang';
    protected $allowedFields = ['id_bidang', 'nama_bidang'];
}

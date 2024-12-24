<?php
namespace App\Models;

use CodeIgniter\Model;

class TingkatModel extends Model
{
    protected $table = 'm_tingkat';
    protected $primaryKey = 'id_tingkat';
    protected $allowedFields = ['id_tingkat', 'nama_tingkat'];
}

<?php
namespace App\Models;

use CodeIgniter\Model;

class EkskulModel extends Model
{
    protected $table = 'm_ekskul';
    protected $primaryKey = 'id_ekskul';
    protected $allowedFields = ['id_ekskul', 'nama_ekskul'];
}

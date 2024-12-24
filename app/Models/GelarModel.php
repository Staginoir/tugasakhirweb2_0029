<?php
namespace App\Models;

use CodeIgniter\Model;

class GelarModel extends Model
{
    protected $table = 'm_gelar';
    protected $primaryKey = 'id_gelar';
    protected $allowedFields = ['id_gelar', 'nama_gelar'];
}

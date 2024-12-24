<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'M_Kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = [
        'id_kelas',
        'level_kelas',
        'nama_kelas',
        'id_guru',
        'kapasitas'
    ];

    protected $validationRules = [
        'id_kelas' => 'required|max_length[6]',
        'level_kelas' => 'required|in_list[10,11,12]',
        'nama_kelas' => 'required|max_length[50]',
        'id_guru' => 'required|max_length[16]',
        'kapasitas' => 'required|numeric|max_length[8]',
    ];
}

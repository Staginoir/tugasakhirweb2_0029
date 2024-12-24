<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'M_guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = [
        'id_guru',
        'nip_guru',
        'nama_guru',
        'kontak_guru',
        'status_jabatan'
    ];

    protected $validationRules = [
        'id_guru' => 'required|max_length[16]',
        'nip_guru' => 'required|max_length[18]',
        'nama_guru' => 'required|max_length[50]',
        'kontak_guru' => 'permit_empty|numeric|max_length[15]',
        'status_jabatan' => 'permit_empty|max_length[25]',
    ];
}

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
        'kapasitas' => 'required|max_length[8]',
    ];

    public function getKelasWithGuru()
    {
        return $this->select('M_Kelas.*, M_Guru.nama_guru')
            ->join('M_Guru', 'M_Kelas.id_guru = M_Guru.id_guru')
            ->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class MSiswaModel extends Model
{
    protected $table = 'm_siswa'; 
    protected $primaryKey = 'nis_siswa'; 
    protected $allowedFields = [
        'nis_siswa',
        'nama_siswa',
        'id_kelas',
        'jenis_kelamin',
        'alamat_siswa',
        'kontak_siswa',
        'passw_siswa'
    ]; // Kolom-kolom yang dapat diisi

    protected $validationRules = [
        'nis_siswa' => 'required|is_unique[M_Siswa.nis_siswa]|max_length[5]',
        'nama_siswa' => 'required|max_length[100]',
        'id_kelas' => 'required|max_length[6]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
        'alamat_siswa' => 'permit_empty|max_length[255]',
        'kontak_siswa' => 'permit_empty|numeric|max_length[15]',
        'passw_siswa' => 'required|max_length[255]',
    ];

    protected $validationMessages = [
        'nis_siswa' => [
            'required' => 'NIS Siswa wajib diisi.',
            'is_unique' => 'NIS Siswa sudah ada.',
            'max_length' => 'NIS Siswa tidak boleh lebih dari 5 karakter.',
        ],
        'nama_siswa' => [
            'required' => 'Nama Siswa wajib diisi.',
            'max_length' => 'Nama Siswa tidak boleh lebih dari 100 karakter.',
        ],
        'id_kelas' => [
            'required' => 'ID Kelas wajib diisi.',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis Kelamin wajib diisi.',
            'in_list' => 'Jenis Kelamin hanya bisa Laki-laki atau Perempuan.',
        ],
    ];
    public function getSiswaWithKelas()
{
    return $this->select('m_siswa.*, m_kelas.nama_kelas')
                ->join('m_kelas', 'm_Kelas.id_kelas = m_siswa.id_kelas')
                ->findAll();
}

}

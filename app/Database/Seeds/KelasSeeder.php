<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kelas' => 'KLS001',
                'level_kelas' => '10',
                'nama_kelas' => 'X MIPA 2',
                'id_guru' => 'G001', // id_guru dari tabel m_guru
                'kapasitas' => '30 Siswa'
            ],
            [
                'id_kelas' => 'KLS002',
                'level_kelas' => '11',
                'nama_kelas' => 'XI MIPA 1',
                'id_guru' => 'G002', // id_guru dari tabel m_guru
                'kapasitas' => '30 Siswa'
            ],
            [
                'id_kelas' => 'KLS003',
                'level_kelas' => '12',
                'nama_kelas' => 'XII IPS 3',
                'id_guru' => 'G003', // id_guru dari tabel m_guru
                'kapasitas' => '30 Siswa'
            ],
        ];

        $this->db->table('m_kelas')->insertBatch($data);
    }
}

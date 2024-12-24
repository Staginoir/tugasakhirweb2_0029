<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KotaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kota' => 'JKT',
                'nama_kota' => 'Jakarta',
                'id_provinsi' => 'JK', // id_provinsi dari tabel m_provinsi
            ],
            [
                'id_kota' => 'SBY',
                'nama_kota' => 'Surabaya',
                'id_provinsi' => 'JT', // id_provinsi dari tabel m_provinsi
            ],
            [
                'id_kota' => 'BDG',
                'nama_kota' => 'Bandung',
                'id_provinsi' => 'JB', // id_provinsi dari tabel m_provinsi
            ],
        ];

        $this->db->table('m_kota')->insertBatch($data);
    }
}

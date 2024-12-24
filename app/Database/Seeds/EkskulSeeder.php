<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EkskulSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_ekskul' => 'EX001',
                'nama_ekskul' => 'Paskibra',
                'jumlah_siswa' => '25',
                'id_guru' => 'G001', // id_guru dari tabel m_guru
            ],
            [
                'id_ekskul' => 'EX002',
                'nama_ekskul' => 'Pramuka',
                'jumlah_siswa' => '40',
                'id_guru' => 'G002', // id_guru dari tabel m_guru
            ],
            [
                'id_ekskul' => 'EX003',
                'nama_ekskul' => 'Basket',
                'jumlah_siswa' => '18',
                'id_guru' => 'G003', // id_guru dari tabel m_guru
            ],
        ];

        $this->db->table('m_ekskul')->insertBatch($data);
    
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BidangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_bidang' => 'AS', 'nama_bidang' => 'Akademik dan Sains'],
            ['id_bidang' => 'TIK', 'nama_bidang' => 'Teknologi dan Informatika'],
            ['id_bidang' => 'KS', 'nama_bidang' => 'Kreatif dan Seni'],
            ['id_bidang' => 'Olahraga', 'nama_bidang' => 'Olahraga'],
            ['id_bidang' => 'Kewirausahaan', 'nama_bidang' => 'Kewirausahaan'],
            ['id_bidang' => 'IS', 'nama_bidang' => 'Interpersonal dan Sosial'],
        ];

        $this->db->table('m_bidang')->insertBatch($data);
    }
}

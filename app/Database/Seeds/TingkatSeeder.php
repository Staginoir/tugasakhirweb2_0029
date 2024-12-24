<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TingkatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_tingkat' => 'KotKab', 'nama_tingkat' => 'Kota/Kabupaten'],
            ['id_tingkat' => 'DaeProv', 'nama_tingkat' => 'Daerah/Provinsi'],
            ['id_tingkat' => 'Nas', 'nama_tingkat' => 'Nasional'],
            ['id_tingkat' => 'Inter', 'nama_tingkat' => 'Internasional']
        ];

        $this->db->table('m_tingkat')->insertBatch($data);
    }
}

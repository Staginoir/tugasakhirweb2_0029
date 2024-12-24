<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GelarSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_gelar' => 'Ju1', 'nama_gelar' => 'Juara 1'],
            ['id_gelar' => 'Ju2', 'nama_gelar' => 'Juara 2'],
            ['id_gelar' => 'Ju3', 'nama_gelar' => 'Juara 3'],
            ['id_gelar' => 'Hap1', 'nama_gelar' => 'Juara Harapan 1'],
            ['id_gelar' => 'Hap2', 'nama_gelar' => 'Juara Harapan 2'],
            ['id_gelar' => 'Hap3', 'nama_gelar' => 'Juara Harapan 3'],
            ['id_gelar' => 'Med1', 'nama_gelar' => 'Medali Emas'],
            ['id_gelar' => 'Med2', 'nama_gelar' => 'Medali Perak'],
            ['id_gelar' => 'Med3', 'nama_gelar' => 'Medali Preunggu'],
        ];

        $this->db->table('m_gelar')->insertBatch($data);
    }
}

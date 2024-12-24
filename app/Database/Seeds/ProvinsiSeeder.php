<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_provinsi' => 'JKT', 'nama_provinsi' => 'DKI Jakarta'],
            ['id_provinsi' => 'JBR', 'nama_provinsi' => 'Jawa Barat'],
            ['id_provinsi' => 'JTM', 'nama_provinsi' => 'Jawa Timur'],
        ];

        $this->db->table('m_provinsi')->insertBatch($data);
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GuruSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_guru' => 'G001',
                'nip_guru' => '123456789012345678',
                'nama_guru' => 'Budi Santoso',
                'kontak_guru' => '081234567890',
                'status_jabatan' => 'Wali Kelas',
            ],
            [
                'id_guru' => 'G002',
                'nip_guru' => '987654321098765432',
                'nama_guru' => 'Ani Wijaya',
                'kontak_guru' => '081298765432',
                'status_jabatan' => 'Guru Matematika',
            ],
            [
                'id_guru' => 'G003',
                'nip_guru' => '112233445566778899',
                'nama_guru' => 'Cahyo Pranoto',
                'kontak_guru' => '081334556677',
                'status_jabatan' => 'Guru Bahasa Indonesia',
            ],
        ];

        // Insert data ke tabel m_guru
        $this->db->table('m_guru')->insertBatch($data);
    }
}

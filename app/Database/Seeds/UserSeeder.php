<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 'USR001',
                'username' => 'admin123',
                'password' => password_hash('adminpassword', PASSWORD_BCRYPT),
                'role' => 'Admin',
                'access_level' => 1,
                'nis_siswa' => null,
                'id_guru' => null,
                'status' => 'Aktif',
            ],
            [
                'id_user' => 'USR002',
                'username' => 'kesiswaan01',
                'password' => password_hash('kesiswaanpass', PASSWORD_BCRYPT),
                'role' => 'Kesiswaan',
                'access_level' => 1,
                'nis_siswa' => null,
                'id_guru' => 'G001',
                'status' => 'Aktif',
            ],
            [
                'id_user' => 'USR003',
                'username' => 'wakasek02',
                'password' => password_hash('wakasekpass', PASSWORD_BCRYPT),
                'role' => 'Wakasek',
                'access_level' => 2,
                'nis_siswa' => null,
                'id_guru' => 'G002',
                'status' => 'Aktif',
            ],
            [
                'id_user' => 'USR004',
                'username' => 'walikelas01',
                'password' => password_hash('walikelaspass', PASSWORD_BCRYPT),
                'role' => 'Wali Kelas',
                'access_level' => 3,
                'nis_siswa' => null,
                'id_guru' => 'G003',
                'status' => 'Aktif',
            ],
            [
                'id_user' => 'USR005',
                'username' => 'siswa001',
                'password' => password_hash('siswapassword', PASSWORD_BCRYPT),
                'role' => 'Siswa',
                'access_level' => 4,
                'nis_siswa' => '10102',
                'id_guru' => null,
                'status' => 'Aktif',
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}

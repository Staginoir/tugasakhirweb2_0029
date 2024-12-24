<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MSiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nis_siswa' => '10102',
                'nama_siswa' => 'Ahmad Yusuf',
                'id_kelas' => 'KLS001', // id_kelas dari tabel m_kelas
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_siswa' => 'Jl. Merdeka No. 10, Jakarta',
                'kontak_siswa' => '081234567890',
                'passw_siswa' => password_hash('password123', PASSWORD_BCRYPT),
            ],
            [
                'nis_siswa' => '11221',
                'nama_siswa' => 'Dewi Anggraini',
                'id_kelas' => 'KLS002', // id_kelas dari tabel m_kelas
                'jenis_kelamin' => 'Perempuan',
                'alamat_siswa' => 'Jl. Sudirman No. 45, Surabaya',
                'kontak_siswa' => '082345678901',
                'passw_siswa' => password_hash('dewipassword', PASSWORD_BCRYPT),
            ],
            [
                'nis_siswa' => '13240',
                'nama_siswa' => 'Rizky Pratama',
                'id_kelas' => 'KLS003', // id_kelas dari tabel m_kelas
                'jenis_kelamin' => 'Laki-Laki',
                'alamat_siswa' => 'Jl. Diponegoro No. 21, Bandung',
                'kontak_siswa' => '083456789012',
                'passw_siswa' => password_hash('rizkypassword', PASSWORD_BCRYPT),
            ],
        ];

        $this->db->table('m_siswa')->insertBatch($data);
    }
}

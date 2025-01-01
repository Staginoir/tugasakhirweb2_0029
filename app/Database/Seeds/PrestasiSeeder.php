<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_prestasi' => 'PRS001',
                'jenis_prestasi' => 'Akademik',
                'id_tingkat' => 'DaeProv', // id_tingkat dari tabel M_Tingkat
                'id_gelar' => 'Ju1',   // id_gelar dari tabel M_Gelar
                'id_bidang' => 'AS',   // id_bidang dari tabel M_bidang
                'nama_pembina' => '',
                'id_ekskul' => 'EX001', // id_ekskul dari tabel M_ekskul
                'nama_kegiatan' => 'Olimpiade Matematika',
                'tempat' => 'Jakarta',
                'id_kota' => 'JKT', // id_kota dari tabel M_kota
                'id_provinsi' => 'JK', // id_provinsi dari tabel M_provinsi
                'persetujuan_walkelas' => 'Menunggu',
                'persetujuan_wakasek' => 'Menunggu',
                'penyelenggara' => 'Kementerian Pendidikan',
                'jumlah_sekolah' => '20',
                'jumlah_peserta' => '200',
                'waktu_pelaksanaan' => '2024-12-01',
                'bukti_sertif' => 'sertifikat_001.pdf',
                'bukti_kegiatan' => 'dokumentasi_001.jpg',
                'nis_siswa' => '11221',
            ],
            [
                'id_prestasi' => 'PRS002',
                'jenis_prestasi' => 'Non Akademik',
                'id_tingkat' => 'DaeProv',
                'id_gelar' => 'Ju1',
                'id_bidang' => 'Olahraga',
                'nama_pembina' => 'Siti Rahmawati',
                'id_ekskul' => 'EX003',
                'nama_kegiatan' => 'Lomba Basket',
                'tempat' => 'Bandung',
                'id_kota' => 'BDG',
                'id_provinsi' => 'JB',
                'persetujuan_walkelas' => 'Menunggu',
                'persetujuan_wakasek' => 'Menunggu',
                'penyelenggara' => 'PB Perbasi',
                'jumlah_sekolah' => '15',
                'jumlah_peserta' => '150',
                'waktu_pelaksanaan' => '2024-11-15',
                'bukti_sertif' => 'sertifikat_002.pdf',
                'bukti_kegiatan' => 'dokumentasi_002.jpg',
                'nis_siswa' => '13240',
            ],
        ];

        $this->db->table('m_prestasi')->insertBatch($data);
    }
}

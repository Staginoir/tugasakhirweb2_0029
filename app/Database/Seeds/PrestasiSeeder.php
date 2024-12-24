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
                'id_tingkat' => 'TNG001', // id_tingkat dari tabel M_Tingkat
                'id_gelar' => 'GLR001',   // id_gelar dari tabel M_Gelar
                'id_bidang' => 'BD001',   // id_bidang dari tabel M_bidang
                'nama_pembina' => '',
                'id_ekskul' => 'EKS001', // id_ekskul dari tabel M_ekskul
                'nama_kegiatan' => 'Olimpiade Matematika',
                'tempat' => 'Jakarta',
                'id_kota' => 'KT001', // id_kota dari tabel M_kota
                'id_provinsi' => 'PR01', // id_provinsi dari tabel M_provinsi
                'persetujuan_walkelas' => 'Diterima',
                'persetujuan_wakasek' => 'Diterima',
                'penyelenggara' => 'Kementerian Pendidikan',
                'jumlah_sekolah' => '20',
                'jumlah_peserta' => '200',
                'waktu_pelaksanaan' => '2024-12-01',
                'bukti_sertif' => 'sertifikat_001.pdf',
                'bukti_kegiatan' => 'dokumentasi_001.jpg',
                'nis_siswa' => 'S001',
            ],
            [
                'id_prestasi' => 'PRS002',
                'jenis_prestasi' => 'Non Akademik',
                'id_tingkat' => 'TNG002',
                'id_gelar' => 'GLR002',
                'id_bidang' => 'BD002',
                'nama_pembina' => 'Siti Rahmawati',
                'id_ekskul' => 'EKS002',
                'nama_kegiatan' => 'Lomba Basket',
                'tempat' => 'Bandung',
                'id_kota' => 'KT002',
                'id_provinsi' => 'PR02',
                'persetujuan_walkelas' => 'Menunggu',
                'persetujuan_wakasek' => 'Diterima',
                'penyelenggara' => 'PB Perbasi',
                'jumlah_sekolah' => '15',
                'jumlah_peserta' => '150',
                'waktu_pelaksanaan' => '2024-11-15',
                'bukti_sertif' => 'sertifikat_002.pdf',
                'bukti_kegiatan' => 'dokumentasi_002.jpg',
                'nis_siswa' => 'S002',
            ],
        ];

        $this->db->table('m_prestasi')->insertBatch($data);
    }
}

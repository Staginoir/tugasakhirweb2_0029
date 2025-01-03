<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table = 'M_Prestasi';
    protected $primaryKey = 'id_prestasi';
    protected $allowedFields = [
        'id_prestasi',
        'jenis_prestasi',
        'id_tingkat',
        'id_gelar',
        'id_bidang',
        'nama_pembina',
        'id_ekskul',
        'nama_kegiatan',
        'tempat',
        'id_kota',
        'id_provinsi',
        'persetujuan_walkelas',
        'persetujuan_wakasek',
        'penyelenggara',
        'jumlah_sekolah',
        'jumlah_peserta',
        'waktu_pelaksanaan',
        'bukti_sertif',
        'bukti_kegiatan',
        'nis_siswa'
    ];

    protected $validationRules = [
        'id_prestasi' => 'required|max_length[18]',
        'jenis_prestasi' => 'required|in_list[Akademik,Non Akademik]',
        'id_tingkat' => 'permit_empty|max_length[10]',
        'id_gelar' => 'permit_empty|max_length[4]',
        'id_bidang' => 'permit_empty|max_length[15]',
        'nama_pembina' => 'permit_empty|max_length[50]',
        'id_ekskul' => 'permit_empty|max_length[17]',
        'nama_kegiatan' => 'permit_empty|max_length[100]',
        'tempat' => 'permit_empty|max_length[100]',
        'id_kota' => 'permit_empty|max_length[3]',
        'id_provinsi' => 'permit_empty|max_length[2]',
        'persetujuan_walkelas' => 'required|in_list[Diterima,Ditolak,Menunggu]',
        'persetujuan_wakasek' => 'required|in_list[Diterima,Ditolak,Menunggu]',
        'penyelenggara' => 'permit_empty|max_length[100]',
        'jumlah_sekolah' => 'permit_empty|numeric|max_length[20]',
        'jumlah_peserta' => 'permit_empty|numeric|max_length[20]',
        'waktu_pelaksanaan' => 'permit_empty|valid_date',
        'bukti_sertif' => 'permit_empty|max_length[50]',
        'bukti_kegiatan' => 'permit_empty|max_length[50]',
        'nis_siswa' => 'permit_empty|max_length[5]',
    ];
    public function getPrestasiWithSiswa()
{
    return $this->select('M_Prestasi.*, M_Siswa.nama_siswa, M_Siswa.id_kelas AS kelas, m_ekskul.nama_ekskul AS ekstrakurikuler, m_tingkat.nama_tingkat AS tingkat, m_gelar.nama_gelar AS gelar')
                ->join('M_Siswa', 'M_Siswa.nis_siswa = M_Prestasi.nis_siswa', 'left')
                ->join('m_ekskul', 'm_ekskul.id_ekskul = M_Prestasi.id_ekskul', 'left')
                ->join('m_tingkat', 'm_tingkat.id_tingkat = M_Prestasi.id_tingkat', 'left')
                ->join('m_gelar', 'm_gelar.id_gelar = M_Prestasi.id_gelar', 'left')
                ->findAll();
}



}


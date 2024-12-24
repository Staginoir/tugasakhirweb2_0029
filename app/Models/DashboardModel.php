<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getTotalSiswa()
    {
        // Hitung jumlah siswa
        return $this->db->table('m_siswa')->countAll();
    }

    public function getTotalPrestasi()
    {
        // Hitung jumlah prestasi
        return $this->db->table('m_prestasi')->countAll();
    }
}

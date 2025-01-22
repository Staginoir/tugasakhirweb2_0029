<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class ApprovalController extends BaseController
{
    protected $prestasiModel;

    public function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
    }

    // Dashboard Wakasek
    public function wakasekDashboard()
    {
        $jumlahBelumDisetujui = $this->prestasiModel->where('persetujuan_wakasek', 'Menunggu')->countAllResults();
        $jumlahTotalPrestasi = $this->prestasiModel->countAllResults();

        $data = [
            'title' => 'Dashboard Wakasek',
            'jumlahBelumDisetujui' => $jumlahBelumDisetujui,
            'jumlahTotalPrestasi' => $jumlahTotalPrestasi,
            'prestasi' => $this->prestasiModel->where('persetujuan_wakasek', 'Menunggu')->findAll(),
        ];

        return view('wakasek/dashboard', $data);
    }

    public function semuaPrestasi()
    {
        $prestasi = $this->prestasiModel->getAllPrestasiWithSiswa();


        $data = [
            'title' => 'Semua Prestasi',
            'prestasi' => $prestasi,
        ];

        return view('wakasek/semua_prestasi', $data);
    }

    public function semuaPrestasiwali()
    {
        $prestasi = $this->prestasiModel->getAllPrestasiWithSiswa();


        $data = [
            'title' => 'Semua Prestasi',
            'prestasi' => $prestasi,
        ];

        return view('walikelas/semua_prestasi', $data);
    }

    // Persetujuan Prestasi untuk Wakasek
    public function persetujuanPrestasi()
    {
        $allPrestasi = $this->prestasiModel->getAllPrestasiWithSiswa();
        // dd($allPrestasi);
        $filteredPrestasi = array_filter($allPrestasi, function ($prestasi) {
            return $prestasi['persetujuan_wakasek'] === 'Menunggu'; // Sesuaikan key dan value
        });

        $data = [
            'title' => 'Persetujuan Prestasi Wakasek',
            'prestasi' => $filteredPrestasi,

        ];

        return view('wakasek/persetujuan_prestasi', $data);
    }


    public function detailPrestasi($id_prestasi)
    {
        // Ambil data prestasi dengan relasi lengkap
        $prestasi = $this->prestasiModel
            ->select(
                'M_Prestasi.*, 
            M_Siswa.nama_siswa, 
            M_Kelas.nama_kelas, 
            m_ekskul.nama_ekskul AS ekstrakurikuler, 
            m_tingkat.nama_tingkat AS tingkat, 
            m_gelar.nama_gelar AS gelar, 
            m_kota.nama_kota AS kota, 
            m_provinsi.nama_provinsi AS provinsi'
            )
            ->join('M_Siswa', 'M_Siswa.nis_siswa = M_Prestasi.nis_siswa', 'left')
            ->join('M_Kelas', 'M_Kelas.id_kelas = M_Siswa.id_kelas', 'left')
            ->join('m_ekskul', 'm_ekskul.id_ekskul = M_Prestasi.id_ekskul', 'left')
            ->join('m_tingkat', 'm_tingkat.id_tingkat = M_Prestasi.id_tingkat', 'left')
            ->join('m_gelar', 'm_gelar.id_gelar = M_Prestasi.id_gelar', 'left')
            ->join('m_kota', 'm_kota.id_kota = M_Prestasi.id_kota', 'left')
            ->join('m_provinsi', 'm_provinsi.id_provinsi = M_Prestasi.id_provinsi', 'left')
            ->where('M_Prestasi.id_prestasi', $id_prestasi)
            ->first();

        // Cek apakah data ditemukan
        if ($prestasi) {
            return $this->response->setJSON([
                'success' => true,
                'prestasi' => $prestasi,
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Detail prestasi tidak ditemukan.',
            ]);
        }
    }



    // Dashboard Wali Kelas
    public function waliKelasDashboard()
    {
        // Menghitung jumlah prestasi yang belum disetujui
        $jumlahBelumDisetujui = $this->prestasiModel->where('persetujuan_walkelas', 'Menunggu')->countAllResults();

        // Menghitung total jumlah prestasi
        $jumlahTotalPrestasi = $this->prestasiModel->countAllResults();

        // Menyiapkan data untuk view
        $data = [
            'title' => 'Dashboard Wali Kelas',
            'jumlahBelumDisetujui' => $jumlahBelumDisetujui,
            'jumlahTotalPrestasi' => $jumlahTotalPrestasi,  // Menambahkan jumlah total prestasi
            'prestasi' => $this->prestasiModel->where('persetujuan_walkelas', 'Menunggu')->findAll(),
        ];

        // Mengirimkan data ke view
        return view('walikelas/dashboard', $data);
    }


    // Persetujuan Prestasi untuk Wali Kelas
    public function persetujuan_prestasi()
    {
        $allPrestasi = $this->prestasiModel->getAllPrestasiWithSiswa();
        // dd($allPrestasi);
        $filteredPrestasi = array_filter($allPrestasi, function ($prestasi) {
            return $prestasi['persetujuan_walkelas'] === 'Menunggu'; // Sesuaikan key dan value
        });

        $data = [
            'title' => 'Persetujuan Prestasi Walikelas',
            'prestasi' => $filteredPrestasi,

        ];

        return view('walikelas/persetujuan_prestasi', $data);
    }

    // Proses Approve
    public function approve($id_prestasi)
    {
        $session = session();
        $role = $session->get('access_level');
        // Update persetujuan berdasarkan role
        if ($role === '2') {
            $this->prestasiModel->update($id_prestasi, ['persetujuan_wakasek' => 'Diterima']);
            return redirect()->to("/wakasek/persetujuan_prestasi")->with('success', 'Prestasi berhasil disetujui.');
        } elseif ($role === '3') {
            $this->prestasiModel->update($id_prestasi, ['persetujuan_walkelas' => 'Diterima']);
            return redirect()->to("/walikelas/persetujuan_prestasi")->with('success', 'Prestasi berhasil disetujui.');
        } else {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }
    }


    public function updateApproval($id_prestasi, $status)
    {
        if (!in_array($status, ['Diterima', 'Ditolak'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Status tidak valid.'
            ]);
        }

        // Periksa role pengguna
        $session = session();
        $role = $session->get('access_level');

        if ($role === '2') {  // Wakasek
            $this->prestasiModel->update($id_prestasi, ['persetujuan_wakasek' => $status]);
        } elseif ($role === '3') {  // Wali Kelas
            $this->prestasiModel->update($id_prestasi, ['persetujuan_walkelas' => $status]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Anda tidak memiliki akses.'
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Status berhasil diperbarui.'
        ]);
    }

    public function reject($id_prestasi)
    {
        $session = session();
        $role = $session->get('access_level');
        // dd($role);
        // Pastikan user memiliki role yang valid
        if (!$role || !in_array($role, ['2', '3'])) {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }

        // Pastikan prestasi dengan ID tersebut ada
        $prestasi = $this->prestasiModel->find($id_prestasi);
        if (!$prestasi) {
            return redirect()->back()->with('error', 'Data prestasi tidak ditemukan.');
        }

        // Update persetujuan berdasarkan peran pengguna
        if ($role === '2') {
            $this->prestasiModel->update($id_prestasi, ['persetujuan_wakasek' => 'Ditolak']);
        } elseif ($role === '3') {
            $this->prestasiModel->update($id_prestasi, ['persetujuan_walkelas' => 'Ditolak']);
        }
        if($role == '2'){
            $role = 'walikelas'; 
        } elseif($role == '3'){
            $role = 'wakasek'; 
        }

        return redirect()->to(base_url("$role/dashboard"))->with('success', 'Prestasi berhasil ditolak.');
    }
}

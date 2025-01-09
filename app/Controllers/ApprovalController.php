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

        $data = [
            'title' => 'Dashboard Wakasek',
            'jumlahBelumDisetujui' => $jumlahBelumDisetujui,
            'prestasi' => $this->prestasiModel->where('persetujuan_wakasek', 'Menunggu')->findAll(),
        ];

        return view('wakasek/dashboard', $data);
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

    // Dashboard Wali Kelas
    public function waliKelasDashboard()
    {
        $jumlahBelumDisetujui = $this->prestasiModel->where('persetujuan_walkelas', 'Menunggu')->countAllResults();

        $data = [
            'title' => 'Dashboard Wali Kelas',
            'jumlahBelumDisetujui' => $jumlahBelumDisetujui,
            'prestasi' => $this->prestasiModel->where('persetujuan_walkelas', 'Menunggu')->findAll(),
        ];

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

    // Proses Reject
    public function reject($id_prestasi)
    {
        $session = session();
        $role = $session->get('role');

        // Update penolakan berdasarkan role
        if ($role === 'Wakasek') {
            $this->prestasiModel->update($id_prestasi, ['persetujuan_wakasek' => 'Ditolak']);
        } elseif ($role === 'Wali Kelas') {
            $this->prestasiModel->update($id_prestasi, ['persetujuan_walkelas' => 'Ditolak']);
        } else {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }

        return redirect()->to("/$role/dashboard")->with('success', 'Prestasi berhasil ditolak.');
    }
}

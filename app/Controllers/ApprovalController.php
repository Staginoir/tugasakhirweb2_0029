<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class ApprovalController extends BaseController
{
    public function index()
    {
        $prestasiModel = new PrestasiModel();
        $session = session();
        $role = $session->get('role');

        // Filter data berdasarkan role
        if ($role === 'Wakasek') {
            $data['prestasi'] = $prestasiModel->where('persetujuan_wakasek', 'Menunggu')->findAll();
        } elseif ($role === 'Wali Kelas') {
            $data['prestasi'] = $prestasiModel->where('persetujuan_walkelas', 'Menunggu')->findAll();
        } else {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }

        return view('approval/index', $data);
    }

    public function approve($id_prestasi)
    {
        $prestasiModel = new PrestasiModel();
        $session = session();
        $role = $session->get('role');

        // Update persetujuan berdasarkan role
        if ($role === 'Wakasek') {
            $prestasiModel->update($id_prestasi, ['persetujuan_wakasek' => 'Diterima']);
        } elseif ($role === 'Wali Kelas') {
            $prestasiModel->update($id_prestasi, ['persetujuan_walkelas' => 'Diterima']);
        } else {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }

        return redirect()->to('/approval')->with('success', 'Prestasi berhasil disetujui.');
    }

    public function reject($id_prestasi)
    {
        $prestasiModel = new PrestasiModel();
        $session = session();
        $role = $session->get('role');

        // Update penolakan berdasarkan role
        if ($role === 'Wakasek') {
            $prestasiModel->update($id_prestasi, ['persetujuan_wakasek' => 'Ditolak']);
        } elseif ($role === 'Wali Kelas') {
            $prestasiModel->update($id_prestasi, ['persetujuan_walkelas' => 'Ditolak']);
        } else {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses.');
        }

        return redirect()->to('/approval')->with('success', 'Prestasi berhasil ditolak.');
    }
}

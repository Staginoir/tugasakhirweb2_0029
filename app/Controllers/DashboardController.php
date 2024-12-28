<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DashboardModel; // Tambahkan model Dashboard

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $dashboardModel = new DashboardModel(); // Instance model Dashboard

        $users = $userModel->findAll(); // Ambil semua data user

        // Ambil username dari session
        $username = session()->get('username');

        // Ambil jumlah siswa dan prestasi
        $totalSiswa = $dashboardModel->getTotalSiswa();
        $totalPrestasi = $dashboardModel->getTotalPrestasi();

        $data = [
            'title' => 'Dashboard', // Tambahkan variabel $title
            'users' => $users, // Kirim data users ke view
            'username' => $username, // Tambahkan $username
            'totalSiswa' => $totalSiswa, // Total siswa
            'totalPrestasi' => $totalPrestasi, // Total prestasi
        ];

        return view('admin/dashboard', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DashboardModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $dashboardModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->userModel = new UserModel();
        $this->dashboardModel = new DashboardModel();
    }

    // Halaman dashboard admin
    public function dashboard()
    {
        // Ambil data dari model
        $users = $this->userModel->findAll();
        $username = session()->get('username');
        $totalSiswa = $this->dashboardModel->getTotalSiswa();
        $totalPrestasi = $this->dashboardModel->getTotalPrestasi();

        // Data yang dikirim ke view
        $data = [
            'title' => 'Dashboard Admin',
            'username' => $username,
            'users' => $users,
            'totalSiswa' => $totalSiswa,
            'totalPrestasi' => $totalPrestasi,
        ];

        return view('admin/dashboard', $data);
    }

    public function masterDataUsers()
    {
        $data['users'] = $this->userModel->findAll(); // Mengambil semua data user
        return view('admin/master_data_users', $data);
    }

    // Fungsi untuk menambah user
    public function addUser()
    {
        $data = [
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Enkripsi password
            'role'         => $this->request->getPost('role'),
            'access_level' => $this->request->getPost('access_level'),
            'nis_siswa'    => $this->request->getPost('nis_siswa') ?: null, // Opsional
            'id_guru'      => $this->request->getPost('id_guru') ?: null,   // Opsional
            'status'       => $this->request->getPost('status'),
        ];

        $this->userModel->insert($data);
        return redirect()->to(base_url('admin/master-data'))->with('success', 'User berhasil ditambahkan.');
    }

    // Fungsi untuk mengedit user
    public function editUser($id_user)
    {
        $data = [
            'username'     => $this->request->getPost('username'),
            'role'         => $this->request->getPost('role'),
            'access_level' => $this->request->getPost('access_level'),
            'nis_siswa'    => $this->request->getPost('nis_siswa') ?: null, // Opsional
            'id_guru'      => $this->request->getPost('id_guru') ?: null,   // Opsional
            'status'       => $this->request->getPost('status'),
        ];

        // Periksa apakah password diubah
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id_user, $data);
        return redirect()->to(base_url('admin/master-data'))->with('success', 'User berhasil diubah.');
    }

    // Fungsi untuk menghapus user
    public function deleteUser($id_user)
    {
        $this->userModel->delete($id_user);
        return redirect()->to(base_url('admin/master-data'))->with('success', 'User berhasil dihapus.');
    }
}

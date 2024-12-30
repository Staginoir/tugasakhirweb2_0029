<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login'); // Menampilkan halaman login
    }

    public function loginProcess()
{
    $session = session();
    $userModel = new UserModel();

    // Validasi input
    $rules = [
        'username' => 'required|min_length[3]|max_length[20]',
        'password' => 'required|min_length[5]',
    ];

    if (!$this->validate($rules)) {
        return redirect()->to('/login')
                         ->withInput()
                         ->with('errors', $this->validator->getErrors());
    }

    // Cari user di database
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $user = $userModel->where('username', $username)->first();

    if (!$user) {
        return redirect()->to('/login')->with('error', 'Username tidak ditemukan.');
    }

    // Verifikasi password
    if (!password_verify($password, $user['password'])) {
        return redirect()->to('/login')->with('error', 'Password salah.');
    }

    // Set session
    $session->set([
        'id_user'      => $user['id_user'],
        'username'     => $user['username'],
        'role'         => $user['role'],
        'access_level' => $user['access_level'], // Tambahkan akses level ke session
        'logged_in'    => true,
    ]);
    

        // Redirect berdasarkan access_level
    if ($user['access_level'] == 1) { // Admin atau Kesiswaan
        return redirect()->to('/admin/dashboard');
    } elseif ($user['access_level'] == 2) { // Wakasek
        return redirect()->to('/approval');
    } elseif ($user['access_level'] == 3) { // Wali Kelas
        return redirect()->to('/approval');
    } elseif ($user['access_level'] == 5) { // Tambahkan peran lain jika ada
        return redirect()->to('/some_other_dashboard');
    }

    // Jika access_level tidak dikenal
    return redirect()->to('/login')->with('error', 'Access level tidak valid.');

}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }
}

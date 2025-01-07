<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MSiswaModel;

class AuthController extends BaseController
{
    // Form login untuk admin
    public function login()
    {
        return view('auth/login'); // Menampilkan form login admin
    }

    // Proses login admin
    public function loginProcess()
    {
        $request = service('request');

        $username = $request->getPost('username');
        $password = $request->getPost('password');

        $usersModel = new UserModel();

        // Cari pengguna berdasarkan username
        $user = $usersModel->where('username', $username)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Set session
                session()->set([
                    'id_user'     => $user['id_user'],
                    'username'    => $user['username'],
                    'access_level'=> $user['access_level'],
                    'logged_in'   => true,
                ]);

                // Redirect berdasarkan access_level
                if ($user['access_level'] == 1) {
                    return redirect()->to('/admin/dashboard'); // Halaman admin
                } elseif ($user['access_level'] == 2) {
                    return redirect()->to('/wakasek/dashboard'); // Halaman wakasek
                } elseif ($user['access_level'] == 3) {
                    return redirect()->to('/walikelas/dashboard'); // Halaman walikelas
                }
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    // Form login untuk siswa
    public function loginSiswa()
    {
        return view('auth/login_siswa'); // Menampilkan form login siswa
    }

    // Proses login siswa
    public function processLoginSiswa()
    {
        $username = $this->request->getPost('nis_siswa');
        $password = $this->request->getPost('password');
    
        $model = new MSiswaModel();
        $siswa = $model->where('nis_siswa', $username)->first();
    
        if (!$siswa) {
            return redirect()->back()->with('error', 'NIS tidak ditemukan.');
        }
    
        // Verifikasi password
        if (!password_verify($password, $siswa['passw_siswa'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }
        
        
        // Jika valid, set session dan redirect
        session()->set([
            'nis_siswa'  => $siswa['nis_siswa'],
            'nama_siswa' => $siswa['nama_siswa'],
            'logged_in'  => true,
        ]);
        return redirect()->to('/siswa/dashboard');
    }
        


    // Logout untuk admin atau siswa
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/'); // Kembali ke halaman login
    }
}

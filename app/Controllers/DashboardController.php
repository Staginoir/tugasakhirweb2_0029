<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Ambil data yang diperlukan (jika ada)
        $data = [
            'title' => 'Dashboard',
            'username' => session()->get('username'), // Ambil nama pengguna dari session
        ];

        // Tampilkan view dashboard
        return view('dashboard/index', $data);
    }
}
    
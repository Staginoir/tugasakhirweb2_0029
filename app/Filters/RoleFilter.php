<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Periksa apakah pengguna sudah login
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Periksa apakah level akses diatur
        if (empty($arguments)) {
            return redirect()->to('/unauthorized')->with('error', 'Akses ke halaman ini tidak diatur.');
        }

        // Pastikan argumen selalu array
        if (!is_array($arguments)) {
            $arguments = [$arguments];
        }

        // Periksa level akses pengguna
        $accessLevel = $session->get('access_level');
        if (!in_array($accessLevel, $arguments)) {
            return redirect()->to('/unauthorized')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada operasi setelah permintaan
    }
}

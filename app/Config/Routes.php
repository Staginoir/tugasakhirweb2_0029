<?php

use App\Controllers\ApprovalController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Autentikasi dan Dasbor
$routes->get('/', 'Home::index');
// $routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login'); // Halaman login
$routes->post('/login', 'AuthController::loginProcess'); // Proses login
$routes->get('/logout', 'AuthController::logout'); // Logout


// Grup untuk Admin
$routes->group('admin', ['filter' => 'access_level:1'], function ($routes) {
    // Dashboard admin
    $routes->get('dashboard', 'AdminController::dashboard');

    // Master Data Users
    $routes->get('master_data_users', 'AdminController::masterDataUsers');
    $routes->get('add-user', 'AdminController::addUserForm'); // Form tambah user
    $routes->post('add-user', 'AdminController::addUser');    // Proses tambah user
    $routes->get('edit-user/(:segment)', 'AdminController::editUserForm/$1'); // Form edit user
    $routes->post('edit-user/(:segment)', 'AdminController::editUser/$1');    // Proses edit user
    $routes->get('delete-user/(:segment)', 'AdminController::deleteUser/$1'); // Hapus user

    // Master Data Siswa
    $routes->get('master_data_siswa', 'AdminController::masterDataSiswa');// Lihat daftar siswa
    $routes->post('add-siswa', 'AdminController::create');       // Tambah siswa
    $routes->post('edit-siswa/(:segment)', 'AdminController::update/$1'); // Edit siswa
    $routes->get('delete-siswa/(:segment)', 'AdminController::delete/$1'); // Hapus siswa

    // Master Data Guru
    $routes->get('master_data_guru', 'AdminController::masterDataGuru'); // Lihat daftar guru
    $routes->post('add-guru', 'AdminController::addGuru');               // Tambah guru
    $routes->post('edit-guru/(:segment)', 'AdminController::editGuru/$1');   // Edit guru
    $routes->get('delete-guru/(:segment)', 'AdminController::deleteGuru/$1');// Hapus guru

    // Master Data Kelas
    $routes->get('master_data_kelas', 'AdminController::masterDataKelas'); // Lihat daftar kelas
    $routes->post('add-kelas', 'AdminController::addKelas');              //  tambah kelas
    $routes->post('edit-kelas/(:segment)', 'AdminController::editKelas/$1');  //  edit kelas
    $routes->get('delete-kelas/(:segment)', 'AdminController::deleteKelas/$1'); // Hapus kelas

    // Master Data Ekstrakurikuler
    $routes->get('master_data_ekskul', 'AdminController::masterDataEkskul'); // Lihat daftar ekstrakurikuler
    $routes->post('add-ekskul', 'AdminController::addEkskul');              // Tambah ekstrakurikuler
    $routes->post('edit-ekskul/(:segment)', 'AdminController::editEkskul/$1');  // Edit ekstrakurikuler
    $routes->get('delete-ekskul/(:segment)', 'AdminController::deleteEkskul/$1');// Hapus ekstrakurikuler

    // Pelaporan Preatasi
    $routes->get('pelaporan_prestasi','AdminController::laporanPrestasi');
    


});

// Routes untuk Wakasek
$routes->group('wakasek', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'ApprovalController::wakasekDashboard');
    $routes->get('approve/(:segment)', 'ApprovalController::approve/$1');
    $routes->get('reject/(:segment)', 'ApprovalController::reject/$1');
    $routes->get('persetujuan_prestasi', 'ApprovalController::persetujuanPrestasi');

});

// Routes untuk Wali Kelas
$routes->group('walikelas', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'ApprovalController::waliKelasDashboard');
    $routes->get('approve/(:segment)', 'ApprovalController::approve/$1');
    $routes->get('reject/(:segment)', 'ApprovalController::reject/$1');
    $routes->get('persetujuan_prestasi','ApprovalController::persetujuan_prestasi');
});



// untuk siswa
$routes->get('/siswa/dashboard', 'SiswaController::dashboard');

// RESTful Resources untuk API
$routes->resource('siswa', ['controller' => 'SiswaController']);
$routes->resource('guru', ['controller' => 'GuruController']);
$routes->resource('kelas', ['controller' => 'KelasController']);
$routes->resource('prestasi', ['controller' => 'PrestasiController']);

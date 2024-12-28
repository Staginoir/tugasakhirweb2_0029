<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Autentikasi dan Dasbor
$routes->get('/', 'AuthController::login');
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
    $routes->get('edit-user/(:num)', 'AdminController::editUserForm/$1'); // Form edit user
    $routes->post('edit-user/(:num)', 'AdminController::editUser/$1');    // Proses edit user
    $routes->get('delete-user/(:num)', 'AdminController::deleteUser/$1'); // Hapus user

    // Master Data Siswa
    $routes->get('master_data_siswa', 'AdminController::masterDataSiswa');// Lihat daftar siswa
    $routes->post('add-siswa', 'AdminController::create');       // Tambah siswa
    $routes->post('edit-siswa/(:num)', 'AdminController::update/$1'); // Edit siswa
    $routes->get('delete-siswa/(:num)', 'AdminController::delete/$1'); // Hapus siswa

    // Master Data Guru
    $routes->get('master_data_guru', 'AdminController::masterDataGuru'); // Lihat daftar guru
    $routes->post('add-guru', 'AdminController::addGuru');               // Tambah guru
    $routes->post('edit-guru/(:num)', 'AdminController::editGuru/$1');   // Edit guru
    $routes->get('delete-guru/(:num)', 'AdminController::deleteGuru/$1');// Hapus guru

    // Master Data Kelas
    $routes->get('master_data_kelas', 'AdminController::masterDataKelas'); // Lihat daftar kelas
    $routes->post('add-kelas', 'AdminController::addKelas');              //  tambah kelas
    $routes->post('edit-kelas/(:num)', 'AdminController::editKelas/$1');  //  edit kelas
    $routes->get('delete-kelas/(:num)', 'AdminController::deleteKelas/$1'); // Hapus kelas

    // Master Data Ekstrakurikuler
    $routes->get('master_data_ekskul', 'AdminController::masterDataEkskul'); // Lihat daftar ekstrakurikuler
    $routes->post('add-ekskul', 'AdminController::addEkskul');              // Tambah ekstrakurikuler
    $routes->post('edit-ekskul/(:num)', 'AdminController::editEkskul/$1');  // Edit ekstrakurikuler
    $routes->get('delete-ekskul/(:num)', 'AdminController::deleteEkskul/$1');// Hapus ekstrakurikuler

    // Pelaporan Preatasi
    $routes->get('pelaporan_prestasi','AdminController::laporanPrestasi');
    


});

// Grup untuk Wakasek
$routes->group('wakasek', ['filter' => 'access_level:2'], function ($routes) {
    $routes->get('dashboard', 'WakasekController::dashboard');
    // Tambahkan rute lainnya
});

// Grup untuk Walikelas
$routes->group('walikelas', ['filter' => 'access_level:3'], function ($routes) {
    $routes->get('dashboard', 'WalikelasController::dashboard');
    // Tambahkan rute lainnya
});


// untuk siswa
$routes->get('/siswa/dashboard', 'SiswaController::dashboard');

// RESTful Resources untuk API
$routes->resource('siswa', ['controller' => 'SiswaController']);
$routes->resource('guru', ['controller' => 'GuruController']);
$routes->resource('kelas', ['controller' => 'KelasController']);
$routes->resource('prestasi', ['controller' => 'PrestasiController']);

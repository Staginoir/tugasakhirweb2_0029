<?php

use App\Controllers\ApprovalController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Autentikasi dan Dasbor
$routes->get('/', 'Home::index');
// $routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login'); // Login page
$routes->post('/login', 'AuthController::loginProcess'); // Process login
$routes->get('/logout', 'AuthController::logout'); // Logout
$routes->get('/login-siswa', 'AuthController::loginSiswa'); // Student login page
$routes->post('auth/processLoginSiswa', 'AuthController::processLoginSiswa'); // Process student login



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
    $routes->post('addstudent', 'AdminController::addStudent');       // Tambah siswa
    $routes->post('edit-student/(:num)', 'AdminController::editStudent/$1'); // Edit siswa
    $routes->get('delete-student/(:num)', 'AdminController::deleteStudent/$1'); // Hapus siswa

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
    $routes->post('approve/(:num)', 'ApprovalController::approve/$1');
    $routes->post('reject/(:num)', 'ApprovalController::reject/$1');
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
$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'SiswaController::dashboard');
    $routes->get('data_prestasi', 'SiswaController::data_prestasi');
    $routes->get('input_prestasi', 'SiswaController::input_prestasi');
    $routes->post('addPrestasi', 'SiswaController::addPrestasi');
    $routes->get('show/(:num)', 'SiswaController::show/$1');
    $routes->get('edit/(:num)', 'SiswaController::edit/$1'); // Menampilkan form edit
    $routes->post('edit/(:num)', 'SiswaController::update/$1'); // Memproses update data
    $routes->get('delete/(:num)', 'SiswaController::delete/$1'); // Menghapus data
    $routes->get('tentang_kami', 'SiswaController::tentangKami');
    $routes->get('faq', 'SiswaController::faq');
    $routes->get('panduan', 'SiswaController::panduan');

});


// RESTful Resources untuk API
$routes->resource('siswa', ['controller' => 'SiswaController']);
$routes->resource('guru', ['controller' => 'GuruController']);
$routes->resource('kelas', ['controller' => 'KelasController']);
$routes->resource('prestasi', ['controller' => 'PrestasiController']);

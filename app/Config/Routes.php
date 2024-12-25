<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login'); // Halaman login
$routes->post('/login', 'AuthController::loginProcess'); // Proses login
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']); // Halaman dashboard, butuh autentikasi
$routes->get('/logout', 'AuthController::logout');



$routes->group('admin', ['filter' => 'access_level:1'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('master_data_users', 'AdminController::masterDataUsers');

        $routes->get('add-user', 'AdminController::addUserForm'); // Menampilkan form tambah user
        $routes->post('add-user', 'AdminController::addUser');    // Proses tambah user
        $routes->get('edit-user/(:num)', 'AdminController::editUserForm/$1'); // Form edit
        $routes->post('edit-user/(:num)', 'AdminController::editUser/$1');    // Proses edit
        $routes->get('delete-user/(:num)', 'AdminController::deleteUser/$1'); // Hapus user
        $routes->get('master_data_siswa', 'Admin\SiswaController::index');
        $routes->post('admin/add-siswa', 'Admin\SiswaController::addSiswa');
        $routes->get('admin/delete-siswa/(:num)', 'Admin\SiswaController::deleteSiswa/$1');

});

$routes->group('kesiswaan', ['filter' => 'access_level:1'], function ($routes) {
    $routes->get('dashboard', 'KesiswaanController::dashboard');
});

$routes->group('wali-kelas', ['filter' => 'access_level:3'], function ($routes) {
    $routes->get('dashboard', 'WaliKelasController::dashboard');
});


$routes->resource('siswa', ['controller' => 'SiswaController']);
$routes->resource('guru', ['controller' => 'GuruController']);
$routes->resource('kelas', ['controller' => 'KelasController']);
$routes->resource('prestasi', ['controller' => 'PrestasiController']);
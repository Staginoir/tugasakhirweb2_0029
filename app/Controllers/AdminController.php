<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DashboardModel;
use App\Models\MSiswaModel;
use CodeIgniter\RESTful\ResourceController;

class AdminController extends BaseController
{
    protected $userModel;
    protected $dashboardModel;
    protected $siswaModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->userModel = new UserModel();
        $this->dashboardModel = new DashboardModel();
        $this->siswaModel = new MSiswaModel();
    }

    // Halaman dashboard admin
    public function dashboard()
    {
        $users = $this->userModel->findAll();
        $username = session()->get('username');
        $totalSiswa = $this->dashboardModel->getTotalSiswa();
        $totalPrestasi = $this->dashboardModel->getTotalPrestasi();

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
        $data['users'] = $this->userModel->findAll();
        return view('admin/master_data_users', $data);
    }

    public function addUser()
    {
        $data = [
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => $this->request->getPost('role'),
            'access_level' => $this->request->getPost('access_level'),
            'nis_siswa'    => $this->request->getPost('nis_siswa') ?: null,
            'id_guru'      => $this->request->getPost('id_guru') ?: null,
            'status'       => $this->request->getPost('status'),
        ];

        $this->userModel->insert($data);
        return redirect()->to(base_url('admin/master_data_users'))->with('success', 'User berhasil ditambahkan.');
    }

    public function editUser($id_user)
    {
        $data = [
            'username'     => $this->request->getPost('username'),
            'role'         => $this->request->getPost('role'),
            'access_level' => $this->request->getPost('access_level'),
            'nis_siswa'    => $this->request->getPost('nis_siswa') ?: null,
            'id_guru'      => $this->request->getPost('id_guru') ?: null,
            'status'       => $this->request->getPost('status'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id_user, $data);
        return redirect()->to(base_url('admin/master_data_users'))->with('success', 'User berhasil diubah.');
    }

    public function deleteUser($id_user)
    {
        $this->userModel->delete($id_user);
        return redirect()->to(base_url('admin/master_data_users'))->with('success', 'User berhasil dihapus.');
    }

    public function masterDataSiswa()
    {
        $data['students'] = $this->siswaModel->findAll();
        return view('admin/master_data_siswa', $data);
    }

    public function addSiswa()
    {
        $data = [
            'nis_siswa'    => $this->request->getPost('nis_siswa'),
            'nama_siswa'   => $this->request->getPost('nama_siswa'),
            'id_kelas'     => $this->request->getPost('id_kelas'),
            'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
            'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            'kontak_siswa' => $this->request->getPost('kontak_siswa'),
            'passw_siswa'  => password_hash($this->request->getPost('passw_siswa'), PASSWORD_DEFAULT),
        ];

        $this->siswaModel->insert($data);
        return redirect()->to(base_url('admin/master_data_siswa'))->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function editSiswa($nis_siswa)
    {
        $data = [
            'nama_siswa'   => $this->request->getPost('nama_siswa'),
            'id_kelas'     => $this->request->getPost('id_kelas'),
            'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
            'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            'kontak_siswa' => $this->request->getPost('kontak_siswa'),
        ];

        if ($this->request->getPost('passw_siswa')) {
            $data['passw_siswa'] = password_hash($this->request->getPost('passw_siswa'), PASSWORD_DEFAULT);
        }

        $this->siswaModel->update($nis_siswa, $data);
        return redirect()->to(base_url('admin/master_data_siswa'))->with('success', 'Siswa berhasil diubah.');
    }

    public function deleteSiswa($nis_siswa)
    {
        $this->siswaModel->delete($nis_siswa);
        return redirect()->to(base_url('admin/master_data_siswa'))->with('success', 'Siswa berhasil dihapus.');
    }
}

class SiswaController extends ResourceController
{
    protected $modelName = 'App\\Models\\MSiswaModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Siswa tidak ditemukan');
        }
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        if (!$this->model->insert($data)) {
            return $this->fail($this->model->errors());
        }

        $createdData = $this->model->find($this->model->insertID());
        return $this->respondCreated($createdData, 'Siswa berhasil dibuat');
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        if (!$this->model->find($id)) {
            return $this->failNotFound('Siswa tidak ditemukan');
        }

        if (!$this->model->update($id, $data)) {
            return $this->fail($this->model->errors());
        }

        $updatedData = $this->model->find($id);
        return $this->respondUpdated($updatedData, 'Siswa berhasil diperbarui');
    }

    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Siswa tidak ditemukan');
        }

        if (!$this->model->delete($id)) {
            return $this->fail('Gagal menghapus Siswa');
        }

        return $this->respondDeleted(['nis_siswa' => $id], 'Siswa berhasil dihapus');
    }
}

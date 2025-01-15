<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\UserModel;
use App\Models\DashboardModel;
use App\Models\MSiswaModel;
use App\Models\GuruModel;
use App\Models\EkskulModel;
use App\Models\PrestasiModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $dashboardModel;
    protected $siswaModel;
    protected $guruModel;
    protected $kelasModel;
    protected $ekskulModel;
    protected $prestasiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->dashboardModel = new DashboardModel();
        $this->siswaModel = new MSiswaModel();
        $this->guruModel = new GuruModel();
        $this->kelasModel = new KelasModel();
        $this->ekskulModel = new EkskulModel();
        $this->prestasiModel = new PrestasiModel();
    }

    // Dashboard Admin
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'username' => session()->get('username'),
            'users' => $this->userModel->findAll(),
            'totalSiswa' => $this->dashboardModel->getTotalSiswa(),
            'totalPrestasi' => $this->dashboardModel->getTotalPrestasi(),
        ];

        return view('admin/dashboard', $data);
    }

    // Master Data User
    public function masterDataUsers()
    {
        $data['users'] = $this->userModel->getUsersWithGuru();
        $data['guru'] = $this->userModel->getGuruForDropdown();
        // dd($data);
        return view('admin/master_data_users', $data);
    }


    // tambah user
    public function addUser()
    {
        // Ambil data dari form
        $data = $this->request->getPost([
            'id_user',
            'username',
            'role',
            'access_level',
            'id_guru',
            'status'
        ]);

        // Hash password
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        // Menyimpan data user ke database
        $this->userModel->insert($data);

        // Redirect ke halaman master data user dengan pesan sukses
        return redirect()->to('admin/master_data_users')->with('success', 'User berhasil ditambahkan.');
    }



    public function editUser($id_user)
    {
        $data = $this->request->getPost([
            'username',
            'role',
            'access_level',
            'nis_siswa',
            'id_guru',
            'status'
        ]);

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id_user, $data);
        return redirect()->to('admin/master_data_users')->with('success', 'User berhasil diubah.');
    }

    public function deleteUser($id_user)
    {
        $this->userModel->delete($id_user);
        return redirect()->to('admin/master_data_users')->with('success', 'User berhasil dihapus.');
    }

    public function masterDataSiswa()
    {
        $model = new \App\Models\MSiswaModel();
        $kelasModel = new \App\Models\KelasModel();
        $data['siswa'] = $model->getSiswaWithKelas();
        $data['kelas'] = $kelasModel->findAll();


        return view('admin/master_data_siswa', $data);
    }

    // tambah siswa
    public function addStudent()
{
    // Ambil data dari request
    $data = $this->request->getPost([
        'nis_siswa',
        'nama_siswa',
        'id_kelas',
        'jenis_kelamin',
        'alamat_siswa',
        'kontak_siswa',
        'passw_siswa',
    ]);

    // Validasi manual
    if (empty($data['nis_siswa']) || empty($data['nama_siswa']) || empty($data['id_kelas']) || empty($data['jenis_kelamin']) || empty($data['passw_siswa'])) {
        return redirect()->to(base_url('admin/master_data_siswa'))->with('error', 'Semua kolom wajib diisi.');
    }

    // Hash password siswa
    $data['passw_siswa'] = password_hash($data['passw_siswa'], PASSWORD_DEFAULT);

    // Proses penyimpanan ke database
    if (!$this->siswaModel->insert($data)) {
        // Tangani error dari model
        $errors = $this->siswaModel->errors();
        log_message('error', implode(', ', $errors)); // Debugging error
        return redirect()->to(base_url('admin/master_data_siswa'))->with('error', implode(', ', $errors));
    }

    // Berhasil menyimpan data
    return redirect()->to(base_url('admin/master_data_siswa'))->with('success', 'Siswa berhasil ditambahkan.');
}


    public function editStudent($nis)
    {
        $data = $this->request->getPost([
            'nama_siswa',
            'id_kelas',
            'jenis_kelamin',
            'alamat_siswa',
            'kontak_siswa',
            'passw_siswa',
        ]);

        // Hash password jika diubah
        if (!empty($data['passw_siswa'])) {
            $data['passw_siswa'] = password_hash($data['passw_siswa'], PASSWORD_DEFAULT);
        } else {
            unset($data['passw_siswa']); // Jika tidak diubah, jangan update password
        }

        // Update data siswa
        if (!$this->siswaModel->update($nis, $data)) {
            return redirect()->to(base_url('admin/master_data_siswa'))
                            ->with('error', 'Gagal memperbarui data siswa.');
        }

        return redirect()->to(base_url('admin/master_data_siswa'))
                        ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function deleteStudent($nis)
    {
        if (!$this->siswaModel->delete($nis)) {
            return redirect()->to(base_url('admin/master_data_siswa'))
                            ->with('error', 'Gagal menghapus data siswa.');
        }

        return redirect()->to(base_url('admin/master_data_siswa'))
                        ->with('success', 'Data siswa berhasil dihapus.');
    }


    // Master Data Guru
    public function masterDataGuru()
    {
        $teachers = $this->guruModel->findAll();
        return view('admin/master_data_guru', ['teachers' => $teachers]);
    }

    // Tambah Guru
    public function addGuru()
    {
        $data = $this->request->getPost([
            'id_guru',
            'nip_guru',
            'nama_guru',
            'kontak_guru',
            'status_jabatan'
        ]);

        $this->guruModel->insert($data);
        return redirect()->to('admin/master_data_guru')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function editGuru($id_guru)
    {
        $data = $this->request->getPost([
            'nip_guru',
            'nama_guru',
            'kontak_guru',
            'status_jabatan'
        ]);

        $this->guruModel->update($id_guru, $data);
        return redirect()->to('admin/master_data_guru')->with('success', 'Guru berhasil diperbarui.');
    }

    public function deleteGuru($id_guru)
    {
        $this->guruModel->delete($id_guru);
        return redirect()->to('admin/master_data_guru')->with('success', 'Guru berhasil dihapus.');
    }

    // Master Data Kelas
    public function masterDataKelas()
    {
        $data['classes'] = $this->kelasModel->getKelasWithGuru();

        // Ambil data semua guru untuk dropdown
        $guruModel = new \App\Models\GuruModel();
        $data['gurus'] = $guruModel->findAll();
        return view('admin/master_data_kelas', $data);
    }

    // tambah kelas
    public function addKelas()
    {
        // Ambil data dari request
        $data = $this->request->getPost([
            'id_kelas',
            'level_kelas',
            'nama_kelas',
            'id_guru',
            'kapasitas'
        ]);

        // Validasi manual (opsional)
        if (empty($data['id_kelas']) || empty($data['level_kelas']) || empty($data['nama_kelas']) || empty($data['id_guru']) || empty($data['kapasitas'])) {
            return redirect()->to('admin/master_data_kelas')->with('error', 'Semua kolom wajib diisi.');
        }

        // Proses penyimpanan ke database
        if (!$this->kelasModel->insert($data)) {
            // Ambil pesan error dari model jika ada
            $errors = $this->kelasModel->errors();
            return redirect()->to('admin/master_data_kelas')->with('error', implode(', ', $errors));
        }

        // Jika berhasil
        return redirect()->to('admin/master_data_kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function editKelas($id_kelas)
    {
        $data = $this->request->getPost([
            'level_kelas',
            'nama_kelas',
            'id_guru',
            'kapasitas'
        ]);

        if (!$this->kelasModel->update($id_kelas, $data)) {
            return redirect()->to('admin/master_data_kelas')->with('error', $this->kelasModel->errors());
        }

        return redirect()->to('admin/master_data_kelas')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function deleteKelas($id_kelas)
    {
        if (!$this->kelasModel->delete($id_kelas)) {
            return redirect()->to('admin/master_data_kelas')->with('error', 'Gagal menghapus kelas.');
        }

        return redirect()->to('admin/master_data_kelas')->with('success', 'Kelas berhasil dihapus.');
    }

    // Menampilkan daftar ekstrakurikuler
    public function masterDataEkskul()
    {
        $data = [
            'title' => 'Master Data Ekstrakurikuler',
            'ekskul' => $this->ekskulModel->getEkskulWithGuru(), // Mengambil data dengan join
            'gurus' => $this->guruModel->findAll(), // Mengambil daftar guru
        ];
        return view('admin/master_data_ekskul', $data);
    }

    // Menambah data ekstrakurikuler
    public function addEkskul()
    {
        $this->ekskulModel->insert([
            'id_ekskul' => $this->request->getPost('id_ekskul'),
            'nama_ekskul' => $this->request->getPost('nama_ekskul'),
            'jumlah_siswa' => $this->request->getPost('jumlah_siswa'),
            'id_guru' => $this->request->getPost('id_guru'),
        ]);

        return redirect()->to('/admin/master_data_ekskul')->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }


    // Mengupdate data ekstrakurikuler
    public function editEkskul($id_ekskul)
    {
        $this->ekskulModel->update($id_ekskul, [
            'nama_ekskul' => $this->request->getPost('nama_ekskul'),
            'jumlah_siswa' => $this->request->getPost('jumlah_siswa'),
            'id_guru' => $this->request->getPost('id_guru'),
        ]);

        return redirect()->to('/admin/master_data_ekskul')->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    // Menghapus data ekstrakurikuler
    public function deleteEkskul($id_ekskul)
    {
        $this->ekskulModel->delete($id_ekskul);

        return redirect()->to('/admin/master_data_ekskul')->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }

    //Pelaporan Prestasi
    public function laporanPrestasi()
    {
        $data = [
            'title' => 'Laporan Prestasi',
            'prestasiList' => $this->prestasiModel->getAllPrestasiWithSiswa()
        ];

        return view('admin/pelaporan_prestasi', $data);
    }
}

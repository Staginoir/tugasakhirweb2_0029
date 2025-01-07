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
        $data['users'] = $this->userModel->findAll();
        return view('admin/master_data_users', $data);
    }

    public function addUser()
    {
        $data = $this->request->getPost([
            'id_user','username', 'role', 'access_level', 'nis_siswa', 'id_guru', 'status'
        ]);
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $this->userModel->insert($data);
        return redirect()->to('admin/master_data_users')->with('success', 'User berhasil ditambahkan.');
    }

    public function editUser($id_user)
    {
        $data = $this->request->getPost([
            'username', 'role', 'access_level', 'nis_siswa', 'id_guru', 'status'
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
        $data['siswa'] = $model->getSiswaWithKelas();

        return view('admin/master_data_siswa', $data);
    }

    
    public function addStudent()
    {
        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = $this->request->getPost([
                'nis_siswa',
                'nama_siswa',
                'id_kelas',
                'jenis_kelamin',
                'alamat_siswa',
                'kontak_siswa',
                'passw_siswa',
            ]);

            // Simpan data ke database
            if (!$this->siswaModel->insert($data)) {
                return redirect()->back()->withInput()->with('errors', $this->siswaModel->errors());
            }

            return redirect()->to(base_url('admin/master_data_siswa'))->with('message', 'Siswa berhasil ditambahkan.');
        }

        // Ambil data kelas menggunakan model
        $data['kelas'] = $this->kelasModel->findAll();

        // Kirim data kelas ke view
        return view('admin/master_data_siswa', $data);
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

        $this->siswaModel->update($nis, $data);
        return redirect()->to(base_url('admin/master_data_siswa'))->with('message', 'Data siswa berhasil diperbarui.');
    }

    public function deleteStudent($nis)
    {
        $this->siswaModel->delete($nis);
        return redirect()->to(base_url('admin/master_data_siswa'))->with('message', 'Data siswa berhasil dihapus.');
    }
    
    // Master Data Guru
    public function masterDataGuru()
    {
        $teachers = $this->guruModel->findAll();
        return view('admin/master_data_guru', ['teachers' => $teachers]);
    }

    public function addGuru()
    {
        $data = $this->request->getPost([
            'id_guru', 'nip_guru', 'nama_guru', 'kontak_guru', 'status_jabatan'
        ]);

        $this->guruModel->insert($data);
        return redirect()->to('admin/master_data_guru')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function editGuru($id_guru)
    {
        $data = $this->request->getPost([
            'nip_guru', 'nama_guru', 'kontak_guru', 'status_jabatan'
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
        $data['classes'] = $this->kelasModel->findAll();
        return view('admin/master_data_kelas', $data);
    }

    public function addKelas()
    {
        $data = $this->request->getPost([
            'id_kelas', 'level_kelas', 'nama_kelas', 'id_guru', 'kapasitas'
        ]);

        if (!$this->kelasModel->insert($data)) {
            return redirect()->to('admin/master_data_kelas')->with('error', $this->kelasModel->errors());
        }

        return redirect()->to('admin/master_data_kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function editKelas($id_kelas)
    {
        $data = $this->request->getPost([
            'level_kelas', 'nama_kelas', 'id_guru', 'kapasitas'
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
        ];
        return view('admin/master_data_ekskul', $data);
    }

    // Menambah data ekstrakurikuler
    public function addEkskul()
    {
        if (!$this->validate(['nama_ekskul' => 'required|max_length[100]'])) {
            return redirect()->to('/admin/master_data_ekskul')
                ->with('error', $this->validator->getErrors());
        }
    
        $this->ekskulModel->insert([
            'nama_ekskul' => $this->request->getPost('nama_ekskul'),
        ]);
    
        return redirect()->to('/admin/master_data_ekskul')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    // Mengupdate data ekstrakurikuler
    public function editEkskul($id_ekskul)
    {
        $this->ekskulModel->update($id_ekskul, [
            'nama_ekskul' => $this->request->getPost('nama_ekskul'),
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

<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class SiswaController extends BaseController
{
    protected $prestasiModel;

    public function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
    }

    // Dashboard siswa
    public function dashboard()
    {
        $session = session();
        return view('siswa/dashboard', [
            'nama_siswa' => $session->get('nama_siswa'),
        ]);
    }

    // Menampilkan data prestasi
    public function data_prestasi()
    {
        $session = session();
        $nis = $session->get('nis_siswa');

        $data = [
            'prestasi' => $this->prestasiModel->getPrestasiByNis($nis),
            'nama_siswa' => $session->get('nama_siswa'),
        ];

        return view('siswa/data_prestasi', $data);
    }

    // Form input prestasi
    public function input_prestasi()
    {
        $session = session();
        $data = [
            'tingkat' => $this->prestasiModel->getDropdownOptions('m_tingkat', 'id_tingkat', 'nama_tingkat'),
            'gelar' => $this->prestasiModel->getDropdownOptions('m_gelar', 'id_gelar', 'nama_gelar'),
            'bidang' => $this->prestasiModel->getDropdownOptions('m_bidang', 'id_bidang', 'nama_bidang'),
            'ekskul' => $this->prestasiModel->getDropdownOptions('m_ekskul', 'id_ekskul', 'nama_ekskul'),
            'kota' => $this->prestasiModel->getDropdownOptions('m_kota', 'id_kota', 'nama_kota'),
            'provinsi' => $this->prestasiModel->getDropdownOptions('m_provinsi', 'id_provinsi', 'nama_provinsi'),
            'nama_siswa' => $session->get('nama_siswa'),
        ];

        return view('siswa/input_prestasi', $data);
    }

    

    // Menambahkan prestasi
    public function addPrestasi()
    {
        $session = session();
        $data = $this->request->getPost();

        // Tambahkan NIS siswa dari session
        $data['nis_siswa'] = $session->get('nis_siswa');

        // Validasi data
        if (!$this->validate([
            'jenis_prestasi' => 'required|in_list[Akademik,Non Akademik]',
            'id_tingkat' => 'required',
            'id_gelar' => 'required',
            'id_bidang' => 'required',
            'nama_pembina' => 'required|max_length[50]',
            'id_ekskul' => 'required',
            'nama_kegiatan' => 'required|max_length[100]',
            'tempat' => 'required|max_length[100]',
            'id_kota' => 'required',
            'id_provinsi' => 'required',
            'waktu_pelaksanaan' => 'required|valid_date',
            'bukti_sertif' => 'uploaded[bukti_sertif]|max_size[bukti_sertif,2048]|ext_in[bukti_sertif,pdf,jpg,jpeg,png]',
            'bukti_kegiatan' => 'uploaded[bukti_kegiatan]|max_size[bukti_kegiatan,2048]|ext_in[bukti_kegiatan,pdf,jpg,jpeg,png]',
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        // Simpan data ke database
        if ($this->prestasiModel->save($data)) {
            return redirect()->to(base_url('siswa/data_prestasi'))->with('success', 'Data prestasi berhasil ditambahkan.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data prestasi.');
    }

    // Menampilkan detail prestasi
    public function show($id)
    {
        $session = session();

        // Ambil data prestasi berdasarkan ID
        $prestasi = $this->prestasiModel->find($id);

        // Jika data tidak ditemukan, tampilkan error
        if (!$prestasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan: $id");
        }

        // Kirim data ke view
        $data = [
            'prestasi' => $prestasi,
            'nama_siswa' => $session->get('nama_siswa'),
        ];

        return view('siswa/detail_prestasi', $data);
    }

    // Mengedit data prestasi
    public function edit($id)
    {
        $session = session();

        
        // Ambil data prestasi berdasarkan ID
        $prestasi = $this->prestasiModel->find($id);

        // Jika data tidak ditemukan, tampilkan error
        if (!$prestasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan: $id");
        }

        if ($this->request->getMethod() === 'post') {
            // Validasi data input
            if (!$this->validate([
                'jenis_prestasi' => 'required|in_list[Akademik,Non Akademik]',
                'id_tingkat' => 'required',
                'id_gelar' => 'required',
                'id_bidang' => 'required',
                'nama_pembina' => 'required|max_length[50]',
                'id_ekskul' => 'required',
                'nama_kegiatan' => 'required|max_length[100]',
                'tempat' => 'required|max_length[100]',
                'id_kota' => 'required',
                'id_provinsi' => 'required',
                'waktu_pelaksanaan' => 'required|valid_date',
            ])) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }

            $data = $this->request->getPost();

            // Update data ke database
            if ($this->prestasiModel->update($id, $data)) {
                return redirect()->to(base_url('siswa/data_prestasi'))->with('success', 'Data prestasi berhasil diperbarui.');
            }

            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data prestasi.');
        }

        // Kirim data ke view
        $data = [
            'prestasi' => $prestasi,
            'tingkat' => $this->prestasiModel->getDropdownOptions('m_tingkat', 'id_tingkat', 'nama_tingkat'),
            'gelar' => $this->prestasiModel->getDropdownOptions('m_gelar', 'id_gelar', 'nama_gelar'),
            'bidang' => $this->prestasiModel->getDropdownOptions('m_bidang', 'id_bidang', 'nama_bidang'),
            'ekskul' => $this->prestasiModel->getDropdownOptions('m_ekskul', 'id_ekskul', 'nama_ekskul'),
            'kota' => $this->prestasiModel->getDropdownOptions('m_kota', 'id_kota', 'nama_kota'),
            'provinsi' => $this->prestasiModel->getDropdownOptions('m_provinsi', 'id_provinsi', 'nama_provinsi'),
            'nama_siswa' => $session->get('nama_siswa'),
        ];

        return view('siswa/edit_prestasi', $data);
    }

    // Menghapus data prestasi
    public function delete($id)
    {
        // Cek apakah data ada
        $prestasi = $this->prestasiModel->find($id);

        if (!$prestasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan: $id");
        }

        // Hapus data dari database
        if ($this->prestasiModel->delete($id)) {
            return redirect()->to(base_url('siswa/data_prestasi'))->with('success', 'Data prestasi berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data prestasi.');
    }


}

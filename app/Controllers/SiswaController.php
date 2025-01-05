<?php

namespace App\Controllers;

use App\Models\PrestasiModel;
class SiswaController extends BaseController
{
    protected $prestasiModel;
    
    public function dashboard()
    {
        $session = session();

        // Kirim data siswa yang login ke view
        return view('siswa/dashboard', [
            'nama_siswa' => $session->get('nama_siswa'), // Ambil nama siswa dari session
        ]);
    }

    public function data_prestasi()
    {
        $session = session();
        $nis = $session->get('nis_siswa'); // Ambil NIS siswa dari session

        $prestasiModel = new \App\Models\PrestasiModel();
        $data['prestasi'] = $prestasiModel->getPrestasiByNis($nis); // Gunakan metode yang sesuai

        // Kirim nama siswa ke view
        $data['nama_siswa'] = $session->get('nama_siswa');

        return view('siswa/data_prestasi', $data);
    }

    public function show($id)
    {
        // Misalnya: Fetch data siswa berdasarkan NIS
        $prestasiModel = new \App\Models\PrestasiModel();
        $prestasi = $prestasiModel->find($id);

        if (!$prestasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan: $id");
        }

        return $this->response->setJSON($prestasi);
    }

    public function input_prestasi()
    {
        $session = session();
        return view('siswa/input_prestasi', [
            'nama_siswa' => $session->get('nama_siswa') // Mengirimkan nama siswa ke view
        ]);
    }
    
    public function addPrestasi()
    {
        $prestasiModel = new PrestasiModel();

        $data = [
            'jenis_prestasi' => $this->request->getPost('jenis_prestasi'),
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'tingkat' => $this->request->getPost('tingkat'),
            'gelar' => $this->request->getPost('gelar'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'nis_siswa' => session()->get('nis_siswa') // Mengambil NIS dari session
        ];

        // Simpan ke database
        if ($prestasiModel->insert($data)) {
            return redirect()->to(base_url('siswa/data_prestasi'))->with('success', 'Data prestasi berhasil ditambahkan.');
        } else {
            return redirect()->to(base_url('siswa/data_prestasi'))->with('error', 'Gagal menambahkan data prestasi.');
        }
    }

}

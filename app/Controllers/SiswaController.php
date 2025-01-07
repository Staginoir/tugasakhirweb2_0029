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

        // Validasi data input, termasuk validasi file upload
        if (!$this->validate([
            'jenis_prestasi' => 'required|in_list[Akademik,Non Akademik]',
            'id_tingkat' => 'permit_empty',
            'id_gelar' => 'permit_empty',
            'id_bidang' => 'permit_empty',
            'nama_pembina' => 'required|max_length[50]',
            'id_ekskul' => 'permit_empty',
            'nama_kegiatan' => 'required|max_length[100]',
            'tempat' => 'permit_empty|max_length[100]',
            'id_kota' => 'permit_empty',
            'id_provinsi' => 'permit_empty',
            'penyelenggara' => 'required|max_length[100]',
            'jumlah_sekolah' => 'permit_empty|max_length[20]',
            'jumlah_peserta' => 'permit_empty|max_length[20]',
            'waktu_pelaksanaan' => 'required|valid_date',
            'bukti_sertif' => [
                'rules' => 'uploaded[bukti_sertif]|max_size[bukti_sertif,2048]|mime_in[bukti_sertif,application/pdf,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Bukti sertifikat wajib diunggah.',
                    'max_size' => 'Ukuran file maksimal adalah 2MB.',
                    'mime_in' => 'Hanya file PDF atau gambar yang diizinkan.',
                ],
            ],
            'bukti_kegiatan' => [
                'rules' => 'uploaded[bukti_kegiatan]|max_size[bukti_kegiatan,2048]|mime_in[bukti_kegiatan,application/pdf,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Bukti kegiatan wajib diunggah.',
                    'max_size' => 'Ukuran file maksimal adalah 2MB.',
                    'mime_in' => 'Hanya file PDF atau gambar yang diizinkan.',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // Ambil data POST
        $data = $this->request->getPost();

        // Gabungkan data POST dengan data statik
        $data = array_merge($data, [
            'persetujuan_walkelas' => 'Menunggu',
            'persetujuan_wakasek' => 'Menunggu',
            'nis_siswa' => $session->get('nis_siswa'),
        ]);

        // Ambil file dari form
        $buktiSertif = $this->request->getFile('bukti_sertif');
        $buktiKegiatan = $this->request->getFile('bukti_kegiatan');

        // Pindahkan file ke folder uploads dan simpan path ke dalam $data
        if ($buktiSertif->isValid() && !$buktiSertif->hasMoved()) {
            // Buat nama file acak untuk sertifikat
            $sertifName = $buktiSertif->getRandomName();

            // Pindahkan file ke folder tujuan
            $buktiSertif->move('uploads/sertifikat', $sertifName);

            // Simpan path file ke array data
            $data['bukti_sertif'] = $sertifName; // Path file sertifikat
        }

        if ($buktiKegiatan->isValid() && !$buktiKegiatan->hasMoved()) {
            // Buat nama file acak untuk kegiatan
            $kegiatanName = $buktiKegiatan->getRandomName();

            // Pindahkan file ke folder tujuan
            $buktiKegiatan->move('uploads/kegiatan', $kegiatanName);

            // Simpan path file ke array data
            $data['bukti_kegiatan'] = $kegiatanName; // Path file kegiatan
        }
        // dd($data);
        if ($this->prestasiModel->save($data)) {
            return redirect()->to(base_url('siswa/data_prestasi'))->with('success', 'Data prestasi berhasil ditambahkan.');
        }
        log_message('error', 'Gagal menyimpan data prestasi ke database: ' . implode(', ', $this->prestasiModel->errors()));
        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data prestasi.');
    }


    // Menampilkan detail prestasi
    public function show($id)
    {
        $session = session();

        // Ambil data prestasi berdasarkan ID dengan relasi
        $prestasi = $this->prestasiModel
                 ->select('M_Prestasi.*, M_Siswa.nama_siswa, m_ekskul.nama_ekskul, m_tingkat.nama_tingkat, m_gelar.nama_gelar, m_kota.nama_kota AS kota, m_provinsi.nama_provinsi AS provinsi')
                 ->join('M_Siswa', 'M_Siswa.nis_siswa = M_Prestasi.nis_siswa', 'left')
                 ->join('m_ekskul', 'm_ekskul.id_ekskul = M_Prestasi.id_ekskul', 'left')
                 ->join('m_tingkat', 'm_tingkat.id_tingkat = M_Prestasi.id_tingkat', 'left')
                 ->join('m_gelar', 'm_gelar.id_gelar = M_Prestasi.id_gelar', 'left')
                 ->join('m_kota', 'm_kota.id_kota = M_Prestasi.id_kota', 'left')
                 ->join('m_provinsi', 'm_provinsi.id_provinsi = M_Prestasi.id_provinsi', 'left')
                 ->find($id);


        // Jika data tidak ditemukan, tampilkan error
        if (!$prestasi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan.");
        }

        // Ambil daftar semua prestasi dengan relasi
        $prestasiList = $this->prestasiModel->getAllPrestasiWithSiswa();

        // Kirim data ke view
        $data = [
            'title' => 'Detail Prestasi',
            'prestasi' => $prestasi,
            'prestasiList' => $prestasiList,
            'nama_siswa' => $session->get('nama_siswa'),
        ];

        return view('siswa/detail_prestasi', $data);
    }

    

    // Mengedit data prestasi
    public function edit($id)
{
    $prestasi = $this->prestasiModel
        ->select('M_Prestasi.*, M_Siswa.nama_siswa, m_tingkat.nama_tingkat, m_gelar.nama_gelar, m_kota.nama_kota, m_provinsi.nama_provinsi')
        ->join('M_Siswa', 'M_Siswa.nis_siswa = M_Prestasi.nis_siswa', 'left')
        ->join('m_tingkat', 'm_tingkat.id_tingkat = M_Prestasi.id_tingkat', 'left')
        ->join('m_gelar', 'm_gelar.id_gelar = M_Prestasi.id_gelar', 'left')
        ->join('m_kota', 'm_kota.id_kota = M_Prestasi.id_kota', 'left')
        ->join('m_provinsi', 'm_provinsi.id_provinsi = M_Prestasi.id_provinsi', 'left')
        ->find($id);

    if (!$prestasi) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan: $id");
    }

    $session = session();
    $data = [
        'prestasi' => $prestasi,
        'tingkat' => $this->prestasiModel->getDropdownOptions('m_tingkat', 'id_tingkat', 'nama_tingkat'),
        'gelar' => $this->prestasiModel->getDropdownOptions('m_gelar', 'id_gelar', 'nama_gelar'),
        'bidang' => $this->prestasiModel->getDropdownOptions('m_bidang', 'id_bidang', 'nama_bidang'),
        'kota' => $this->prestasiModel->getDropdownOptions('m_kota', 'id_kota', 'nama_kota'),
        'provinsi' => $this->prestasiModel->getDropdownOptions('m_provinsi', 'id_provinsi', 'nama_provinsi'),
        'ekskul' => $this->prestasiModel->getDropdownOptions('m_ekskul', 'id_ekskul', 'nama_ekskul'),
        'nis_siswa' => $session->get('nis_siswa'), // Kirimkan NIS siswa ke view
    ];

    return view('siswa/edit_prestasi', $data);
}


    
    // Update data ke database
    public function update($id)
    {
        if (!$this->validate($this->prestasiModel->getValidationRules())) {
            session()->setFlashdata('error', 'Validasi gagal. Silakan periksa input Anda.');
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        // dd($data);
        if ($this->prestasiModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data prestasi berhasil diperbarui.');
            return redirect()->to(base_url('siswa/data_prestasi'));
        }

        session()->setFlashdata('error', 'Gagal memperbarui data prestasi.');
        return redirect()->back()->withInput();
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

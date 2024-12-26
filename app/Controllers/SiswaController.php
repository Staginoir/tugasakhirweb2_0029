<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

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

        // Pastikan siswa dengan ID tersebut ada
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
        // Pastikan siswa dengan ID tersebut ada
        if (!$this->model->find($id)) {
            return $this->failNotFound('Siswa tidak ditemukan');
        }

        if (!$this->model->delete($id)) {
            return $this->fail('Gagal menghapus Siswa');
        }

        return $this->respondDeleted(['nis_siswa' => $id], 'Siswa berhasil dihapus');
    }
}

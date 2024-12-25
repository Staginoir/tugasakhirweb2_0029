<?php
namespace App\Controllers;

use App\Models\MSiswaModel;
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
            return $this->failNotFound('Siswa not found');
        }
        return $this->respond($data);
    }

        public function create()
    {
        $data = $this->request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[50]',
            'kelas' => 'required',
            'nis' => 'required|is_unique[siswa.nis]',
        ]);

        if (!$validation->run($data)) {
            return $this->fail($validation->getErrors());
        }

        if (!$this->model->insert($data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated($data, 'Siswa created');
    }


    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        if (!$this->model->update($id, $data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondUpdated($data, 'Siswa updated');
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->fail('Failed to delete Siswa');
        }

        return $this->respondDeleted(['id' => $id], 'Siswa deleted');
    }
}

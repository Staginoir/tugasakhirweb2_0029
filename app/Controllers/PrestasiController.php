<?php
namespace App\Controllers;

use App\Models\PrestasiModel;
use CodeIgniter\RESTful\ResourceController;

class PrestasiController extends ResourceController
{
    protected $modelName = 'App\\Models\\PrestasiModel';
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
            return $this->failNotFound('Prestasi not found');
        }
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        if (!$this->model->insert($data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated($data, 'Prestasi created');
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        if (!$this->model->update($id, $data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondUpdated($data, 'Prestasi updated');
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->fail('Failed to delete Prestasi');
        }

        return $this->respondDeleted(['id' => $id], 'Prestasi deleted');
    }
}

<?php
namespace App\Controllers;

use App\Models\GuruModel;
use CodeIgniter\RESTful\ResourceController;

class GuruController extends ResourceController
{
    protected $modelName = 'App\\Models\\GuruModel';
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
            return $this->failNotFound('Guru not found');
        }
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        if (!$this->model->insert($data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated($data, 'Guru created');
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        if (!$this->model->update($id, $data)) {
            return $this->fail($this->model->errors());
        }

        return $this->respondUpdated($data, 'Guru updated');
    }

    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->fail('Failed to delete Guru');
        }

        return $this->respondDeleted(['id' => $id], 'Guru deleted');
    }
}

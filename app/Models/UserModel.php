<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'username', 'password', 'role', 'access_level', 'id_guru', 'status'];

    private $encryptionKey = 'your_secret_key'; // Ganti dengan kunci enkripsi yang aman

    public function getUsersWithGuru()
    {
        $users = $this->select('user.*, m_guru.nama_guru')
                      ->join('m_guru', 'm_guru.id_guru = user.id_guru', 'left')
                      ->findAll();
        return $users;
    }

    public function getGuruForDropdown()
    {
        // Ambil data id_guru dan nama_guru untuk dropdown
        return $this->db->table('m_guru')->select('id_guru, nama_guru')->get()->getResultArray();
    }

   
}

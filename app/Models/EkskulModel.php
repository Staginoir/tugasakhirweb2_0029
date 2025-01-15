<?php
namespace App\Models;

use CodeIgniter\Model;

class EkskulModel extends Model
{
    protected $table = 'm_ekskul';
    protected $primaryKey = 'id_ekskul';
    protected $allowedFields = ['id_ekskul', 'nama_ekskul', 'jumlah_siswa', 'id_guru'];

    public function getEkskulWithGuru()
    {
        return $this->select('m_ekskul.*, m_guru.nama_guru AS guru_pembimbing')
                    ->join('m_guru', 'm_guru.id_guru = m_ekskul.id_guru', 'left')
                    ->findAll();
    }
}

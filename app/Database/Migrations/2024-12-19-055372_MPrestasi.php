<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MPrestasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_prestasi' => [
                'type' => 'VARCHAR',
                'constraint' => 18,
            ],
            'jenis_prestasi' => [
                'type' => 'ENUM',
                'constraint' => ['Akademik', 'Non Akademik'],
            ],
            'id_tingkat' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
            'id_gelar' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
                'null' => true,
            ],
            'id_bidang' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'nama_pembina' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'id_ekskul' => [
                'type' => 'VARCHAR',
                'constraint' => 17,
                'null' => true,
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tempat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'id_kota' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
                'null' => true,
            ],
            'id_provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
                'null' => true,
            ],
            'persetujuan_walkelas' => [
                'type' => 'ENUM',
                'constraint' => ['Diterima', 'Ditolak', 'Menunggu'],
                'default' => 'Menunggu',
            ],
            'persetujuan_wakasek' => [
                'type' => 'ENUM',
                'constraint' => ['Diterima', 'Ditolak', 'Menunggu'],
                'default' => 'Menunggu',
            ],
            'penyelenggara' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'jumlah_sekolah' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'jumlah_peserta' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'waktu_pelaksanaan' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'bukti_sertif' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'bukti_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nis_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_prestasi');
        $this->forge->addForeignKey('id_tingkat', 'M_Tingkat', 'id_tingkat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_gelar', 'M_Gelar', 'id_gelar', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_bidang', 'M_Bidang', 'id_bidang', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_ekskul', 'M_Ekskul', 'id_ekskul', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kota', 'M_Kota', 'id_kota', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_provinsi', 'M_Provinsi', 'id_provinsi', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('nis_siswa', 'M_Siswa', 'nis_siswa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('M_Prestasi');
    }

    public function down()
    {
        $this->forge->dropTable('M_Prestasi', true);
    }
}

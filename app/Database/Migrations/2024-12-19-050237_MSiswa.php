<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nis_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'alamat_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kontak_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'passw_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addPrimaryKey('nis_siswa');
        $this->forge->addForeignKey('id_kelas', 'M_Kelas', 'id_kelas', 'CASCADE', 'CASCADE');
        $this->forge->createTable('M_Siswa');
    }

    public function down()
    {
        $this->forge->dropTable('M_Siswa', true);
    }
}

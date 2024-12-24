<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['Admin', 'Kesiswaan', 'Wakasek', 'Wali Kelas', 'Siswa'],
            ],
            'nis_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true,
            ],
            'id_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Aktif', 'Nonaktif'],
                'default' => 'Aktif',
            ],
        ]);
        $this->forge->addPrimaryKey('id_user');
        $this->forge->addForeignKey('nis_siswa', 'M_Siswa', 'nis_siswa', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_guru', 'M_Guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->createTable('User');
    }

    public function down()
    {
        $this->forge->dropTable('User', true);
    }
}

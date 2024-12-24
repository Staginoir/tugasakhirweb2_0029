<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MKelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
            ],
            'level_kelas' => [
                'type' => 'ENUM',
                'constraint' => ['10', '11', '12'],
            ],
            'nama_kelas' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'kapasitas' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
            ],
        ]);
        $this->forge->addPrimaryKey('id_kelas');
        $this->forge->addForeignKey('id_guru', 'M_Guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->createTable('M_Kelas');
    }

    public function down()
    {
        $this->forge->dropTable('M_Kelas', true);
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'nip_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 18,
            ],
            'nama_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'kontak_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true,
            ],
            'status_jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_guru');
        $this->forge->createTable('M_Guru');
    }

    public function down()
    {
        $this->forge->dropTable('M_Guru', true);
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MKota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kota' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
            ],
            'nama_kota' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_kota');
        $this->forge->addForeignKey('id_provinsi', 'M_provinsi', 'id_provinsi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('M_kota');
    }

    public function down()
    {
        $this->forge->dropTable('M_kota', true);
    }
}

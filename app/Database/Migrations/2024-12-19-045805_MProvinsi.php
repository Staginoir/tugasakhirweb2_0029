<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MProvinsi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
            ],
            'nama_provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addPrimaryKey('id_provinsi');
        $this->forge->createTable('M_provinsi');
    }

    public function down()
    {
        $this->forge->dropTable('M_provinsi', true);
    }
}

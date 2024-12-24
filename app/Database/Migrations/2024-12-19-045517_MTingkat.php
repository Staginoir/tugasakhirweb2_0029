<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mtingkat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tingkat' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_tingkat' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addPrimaryKey('id_tingkat');
        $this->forge->createTable('M_Tingkat');
    }

    public function down()
    {
        $this->forge->dropTable('M_Tingkat', true);
    }
}

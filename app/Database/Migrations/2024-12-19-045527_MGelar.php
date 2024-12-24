<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MGelar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gelar' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'name_gelar' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addPrimaryKey('id_gelar');
        $this->forge->createTable('M_Gelar');
    }

    public function down()
    {
        $this->forge->dropTable('M_Gelar', true);
    }
}

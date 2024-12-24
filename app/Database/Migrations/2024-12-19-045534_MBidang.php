<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MBidang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bidang' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'nama_bidang' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        $this->forge->addPrimaryKey('id_bidang');
        $this->forge->createTable('M_bidang');
    }

    public function down()
    {
        $this->forge->dropTable('M_bidang', true);
    }
}

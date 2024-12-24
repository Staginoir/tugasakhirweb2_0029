<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MEkskul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ekskul' => [
                'type' => 'VARCHAR',
                'constraint' => 17,
            ],
            'nama_ekskul' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jumlah_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
                'null' => true,
            ],
            'id_guru' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_ekskul');
        $this->forge->addForeignKey('id_guru', 'M_Guru', 'id_guru', 'CASCADE', 'CASCADE');
        $this->forge->createTable('M_Ekskul');
    }

    public function down()
    {
        $this->forge->dropTable('M_Ekskul', true);
    }
}

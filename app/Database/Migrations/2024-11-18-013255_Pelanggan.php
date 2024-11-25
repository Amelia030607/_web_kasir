<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField ([
            'id_pelanggan' => [
                'type' => 'int',
                'constrain' => 11,
                'null' => false,
                'auto increment' => true, 
            ],
            'nama_pelanggan' => [
                'type' => 'varchar',
                'constrain' => 255,
            ],
            'alamat_pelanggan' => [
                'type' => 'text',
            ],
            'no_telp' => [
                'type' => 'varchar',
                'constrain' => 15,
            ],
            'created_at' => [
                'type' => 'datetime',
            ],
            'updated_at' => [
                'type' => 'datetime',
            ]
            ]);
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}

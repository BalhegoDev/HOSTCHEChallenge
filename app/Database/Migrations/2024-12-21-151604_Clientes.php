<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'null' => false,
                'auto_increment' => true
            ],
            "nome" => [
                'type' => "VARCHAR",
                "constraint" => '100',
                'null' => false
            ],
            "email" => [
                'type' => "VARCHAR",
                'constraint' => "100",
                "null" => false
            ],
            "senha" => [
                'type' => "VARCHAR",
                'constraint' => "255",
                'null' => false
            ],
            "CPF" => [
                'type' => "VARCHAR",
                'constraint' => "11",
                'null' => false,
                'unique' => true
            ]
        ]);
        $this->forge->addKey("id",true);
        $this->forge->createTable("clientes");
    }

    public function down()
    {
        $this->forge->dropTable("clientes");
    }
}

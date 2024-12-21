<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empresas extends Migration
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
            "cnpj" => [
                'type' => "VARCHAR",
                'constraint' => "14",
                'null' => false,
                'unique' => true
            ],
            "id_dono" => [
                "type" => "INT",
                "null" => false
            ]
        ]);
        $this->forge->addKey("id",true);
        $this->forge->addForeignKey("id_dono","clientes","id");

        $this->forge->createTable("empresas");
    }

    public function down()
    {
        $this->forge->dropTable("empresas");
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categoria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "null" => false,
                "auto_increment" => true
            ],
            "categoria" => [
                "type" => "VARCHAR",
                "constraint" => "100",
                "null" => false
            ]
        ]);
        $this->forge->addKey("id",true);
        $this->forge->createTable("categorias");
    }

    public function down()
    {
        $this->forge->dropTable("categorias");
    }
}

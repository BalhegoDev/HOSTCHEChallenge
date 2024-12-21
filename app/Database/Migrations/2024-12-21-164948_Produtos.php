<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Produtos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => "INT",
                'null' => false,
                'auto_increment' => true
            ],
            "produto" => [
                'type' => "VARCHAR",
                "constraint" => '100',
                'null' => false
            ],
            "id_categoria" => [
                'type' => "INT",
                'null' => false
            ],
            "qntd_estoque" => [
                'type' => "INT",
                'null' => false
            ],
            "id_empresa_pertencente" => [
                'type' => "INT",
                'null' => false
            ],
            "preco_unitario" => [
                'type' => "DECIMAL",
                'constraint' => "10,2",
                "null" => false
            ],
            "data_cadastrado" => [
                'type' => "TIMESTAMP",
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);
        $this->forge->addKey("id",true);
        $this->forge->addForeignKey("id_categoria","categorias","id");
        $this->forge->addForeignKey("id_empresa_pertencente","empresas","id");
        $this->forge->createTable("produtos");
    }

    public function down()
    {
        $this->forge->dropTable("produtos");
    }
}

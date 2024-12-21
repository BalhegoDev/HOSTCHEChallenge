<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdutosVendidos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id_empresa_pertencente" => [
                'type' => "INT",
                'null' => false
            ],
            "id_cliente" => [
                'type' => "INT",
                'null' => false
            ],
            "id_produto" => [
                'type' => "INT",
                'null' => false
            ],
            "valor total" => [
                'type' => "DECIMAL",
                'constraint' => "10,2",
                'null' => false
            ]
        ]);
        $this->forge->addForeignKey("id_empresa_pertencente","empresas","id");
        $this->forge->addForeignKey("id_cliente","clientes","id");
        $this->forge->addForeignKey("id_produto","produtos","id");
        $this->forge->createTable("produtos_vendidos");
    }

    public function down()
    {
        $this->forge->dropTable("produtos_vendidos");
    }
}

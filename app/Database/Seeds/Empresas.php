<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Empresas extends Seeder
{
    public function run()
    {
        $data = [
            [
                "nome" => "Agro Sul",
                "cnpj" => "37786451000106",
                "id_dono" => 1
            ],
            [
                "nome" => "Fazenda Verde",
                "cnpj" => "15423475000101",
                "id_dono" => 2
            ],
            [
                "nome" => "Plantação Norte",
                "cnpj" => "32618736000178",
                "id_dono" => 3
            ],
            [
                "nome" => "Cultivações União",
                "cnpj" => "46829384000145",
                "id_dono" => 4
            ],
            [
                "nome" => "Produtos Rurais LTDA",
                "cnpj" => "78542153000112",
                "id_dono" => 5
            ],
            [
                "nome" => "Sementes e Soluções",
                "cnpj" => "12309845000180",
                "id_dono" => 6
            ],
            [
                "nome" => "Agro Industrial Oeste",
                "cnpj" => "90123764000199",
                "id_dono" => 7
            ]
        ];

        foreach($data as $empresa){
            $this->db->table("empresas")->insert($empresa);
        }
    }
}

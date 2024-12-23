<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categorias extends Seeder
{
    public function run()
    {
        $data = [
            "Grãos e Cereais",
            "Produtos Orgânicos",
            "Sementes",
            "Fertilizantes",
            "Outros"
        ];

        foreach($data as $categoria){
            $this->db->table("categorias")->insert([
                "categoria" => $categoria
            ]);
        }
    }
}

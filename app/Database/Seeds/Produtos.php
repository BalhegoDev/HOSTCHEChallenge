<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Produtos extends Seeder
{
    public function run()
    {
        $data = [
            ["produto" => "Arroz", "id_categoria" => 1, "qntd_estoque" => 500, "id_empresa_pertencente" => 4, "preco_unitario" => 10],
            ["produto" => "Feijão", "id_categoria" => 1, "qntd_estoque" => 300, "id_empresa_pertencente" => 1, "preco_unitario" => 8],
            ["produto" => "Milho", "id_categoria" => 1, "qntd_estoque" => 400, "id_empresa_pertencente" => 2, "preco_unitario" => 6],
            ["produto" => "Soja", "id_categoria" => 1, "qntd_estoque" => 700, "id_empresa_pertencente" => 5, "preco_unitario" => 12],
            ["produto" => "Trigo", "id_categoria" => 1, "qntd_estoque" => 600, "id_empresa_pertencente" => 3, "preco_unitario" => 9],
            ["produto" => "Cevada", "id_categoria" => 1, "qntd_estoque" => 500, "id_empresa_pertencente" => 6, "preco_unitario" => 11],
            ["produto" => "Lentilha", "id_categoria" => 1, "qntd_estoque" => 200, "id_empresa_pertencente" => 7, "preco_unitario" => 15],
        
            ["produto" => "Tomate", "id_categoria" => 2, "qntd_estoque" => 200, "id_empresa_pertencente" => 3, "preco_unitario" => 7],
            ["produto" => "Batata", "id_categoria" => 2, "qntd_estoque" => 600, "id_empresa_pertencente" => 4, "preco_unitario" => 5],
            ["produto" => "Cenoura", "id_categoria" => 2, "qntd_estoque" => 300, "id_empresa_pertencente" => 5, "preco_unitario" => 4.5],
            ["produto" => "Cebola", "id_categoria" => 2, "qntd_estoque" => 400, "id_empresa_pertencente" => 2, "preco_unitario" => 6],
            ["produto" => "Alho", "id_categoria" => 2, "qntd_estoque" => 150, "id_empresa_pertencente" => 1, "preco_unitario" => 20],
            ["produto" => "Pimentão", "id_categoria" => 2, "qntd_estoque" => 250, "id_empresa_pertencente" => 6, "preco_unitario" => 8],
            ["produto" => "Pepino", "id_categoria" => 2, "qntd_estoque" => 350, "id_empresa_pertencente" => 7, "preco_unitario" => 7],
        
            ["produto" => "Maçã", "id_categoria" => 3, "qntd_estoque" => 350, "id_empresa_pertencente" => 6, "preco_unitario" => 12],
            ["produto" => "Banana", "id_categoria" => 3, "qntd_estoque" => 500, "id_empresa_pertencente" => 7, "preco_unitario" => 10],
            ["produto" => "Uva", "id_categoria" => 3, "qntd_estoque" => 400, "id_empresa_pertencente" => 1, "preco_unitario" => 15],
            ["produto" => "Pera", "id_categoria" => 3, "qntd_estoque" => 200, "id_empresa_pertencente" => 2, "preco_unitario" => 14],
            ["produto" => "Melancia", "id_categoria" => 3, "qntd_estoque" => 100, "id_empresa_pertencente" => 3, "preco_unitario" => 25],
            ["produto" => "Melão", "id_categoria" => 3, "qntd_estoque" => 150, "id_empresa_pertencente" => 4, "preco_unitario" => 18],
            ["produto" => "Laranja", "id_categoria" => 3, "qntd_estoque" => 300, "id_empresa_pertencente" => 5, "preco_unitario" => 9],
        
            ["produto" => "Leite", "id_categoria" => 4, "qntd_estoque" => 600, "id_empresa_pertencente" => 4, "preco_unitario" => 4],
            ["produto" => "Queijo", "id_categoria" => 4, "qntd_estoque" => 200, "id_empresa_pertencente" => 3, "preco_unitario" => 30],
            ["produto" => "Iogurte", "id_categoria" => 4, "qntd_estoque" => 300, "id_empresa_pertencente" => 2, "preco_unitario" => 10],
            ["produto" => "Manteiga", "id_categoria" => 4, "qntd_estoque" => 150, "id_empresa_pertencente" => 1, "preco_unitario" => 20],
            ["produto" => "Creme de Leite", "id_categoria" => 4, "qntd_estoque" => 100, "id_empresa_pertencente" => 6, "preco_unitario" => 12],
            ["produto" => "Leite Condensado", "id_categoria" => 4, "qntd_estoque" => 250, "id_empresa_pertencente" => 5, "preco_unitario" => 15],
            ["produto" => "Ricota", "id_categoria" => 4, "qntd_estoque" => 200, "id_empresa_pertencente" => 7, "preco_unitario" => 22],
        
            ["produto" => "Adubo Orgânico", "id_categoria" => 5, "qntd_estoque" => 800, "id_empresa_pertencente" => 4, "preco_unitario" => 25],
            ["produto" => "Semente de Milho", "id_categoria" => 5, "qntd_estoque" => 500, "id_empresa_pertencente" => 5, "preco_unitario" => 60],
            ["produto" => "Fertilizante", "id_categoria" => 5, "qntd_estoque" => 300, "id_empresa_pertencente" => 6, "preco_unitario" => 40],
            ["produto" => "Inseticida", "id_categoria" => 5, "qntd_estoque" => 100, "id_empresa_pertencente" => 7, "preco_unitario" => 80],
            ["produto" => "Herbicida", "id_categoria" => 5, "qntd_estoque" => 150, "id_empresa_pertencente" => 1, "preco_unitario" => 70],
            ["produto" => "Calcário", "id_categoria" => 5, "qntd_estoque" => 400, "id_empresa_pertencente" => 2, "preco_unitario" => 50],
            ["produto" => "Semente de Trigo", "id_categoria" => 5, "qntd_estoque" => 350, "id_empresa_pertencente" => 3, "preco_unitario" => 55],
        
            ["produto" => "Semente de Soja", "id_categoria" => 5, "qntd_estoque" => 400, "id_empresa_pertencente" => 4, "preco_unitario" => 65],
            ["produto" => "Semente de Cevada", "id_categoria" => 5, "qntd_estoque" => 300, "id_empresa_pertencente" => 5, "preco_unitario" => 50],
            ["produto" => "Adubo Químico", "id_categoria" => 5, "qntd_estoque" => 500, "id_empresa_pertencente" => 6, "preco_unitario" => 90],
            ["produto" => "Calcário Dolomítico", "id_categoria" => 5, "qntd_estoque" => 250, "id_empresa_pertencente" => 7, "preco_unitario" => 45],
            ["produto" => "Fungicida", "id_categoria" => 5, "qntd_estoque" => 100, "id_empresa_pertencente" => 1, "preco_unitario" => 85],
            ["produto" => "Substrato Vegetal", "id_categoria" => 5, "qntd_estoque" => 350, "id_empresa_pertencente" => 2, "preco_unitario" => 35],
            ["produto" => "Farinha de Ossos", "id_categoria" => 5, "qntd_estoque" => 400, "id_empresa_pertencente" => 3, "preco_unitario" => 20],

            ["produto" => "Raquete Elétrica", "id_categoria" => 5, "qntd_estoque" => 150, "id_empresa_pertencente" => 7, "preco_unitario" => 50],
            ["produto" => "Pulverizador", "id_categoria" => 5, "qntd_estoque" => 100, "id_empresa_pertencente" => 6, "preco_unitario" => 200],
            ["produto" => "Trator Pequeno", "id_categoria" => 5, "qntd_estoque" => 20, "id_empresa_pertencente" => 5, "preco_unitario" => 15000],
            ["produto" => "Plantadeira Manual", "id_categoria" => 5, "qntd_estoque" => 70, "id_empresa_pertencente" => 4, "preco_unitario" => 700],
            ["produto" => "Irrigador Portátil", "id_categoria" => 5, "qntd_estoque" => 80, "id_empresa_pertencente" => 3, "preco_unitario" => 300],
            ["produto" => "Colheitadeira", "id_categoria" => 5, "qntd_estoque" => 10, "id_empresa_pertencente" => 2, "preco_unitario" => 50000],
            ["produto" => "Rolo Compactador", "id_categoria" => 5, "qntd_estoque" => 15, "id_empresa_pertencente" => 1, "preco_unitario" => 25000],

            ["produto" => "Ração para Gado", "id_categoria" => 1, "qntd_estoque" => 600, "id_empresa_pertencente" => 1, "preco_unitario" => 80],
            ["produto" => "Sal Mineral", "id_categoria" => 5, "qntd_estoque" => 400, "id_empresa_pertencente" => 2, "preco_unitario" => 50],
            ["produto" => "Feno", "id_categoria" => 2, "qntd_estoque" => 200, "id_empresa_pertencente" => 3, "preco_unitario" => 25],
            ["produto" => "Silagem", "id_categoria" => 5, "qntd_estoque" => 150, "id_empresa_pertencente" => 4, "preco_unitario" => 30],
            ["produto" => "Suplemento Animal", "id_categoria" => 2, "qntd_estoque" => 100, "id_empresa_pertencente" => 5, "preco_unitario" => 100],
            ["produto" => "Vitaminas", "id_categoria" => 2, "qntd_estoque" => 80, "id_empresa_pertencente" => 6, "preco_unitario" => 120],
            ["produto" => "Vacinas", "id_categoria" => 5, "qntd_estoque" => 50, "id_empresa_pertencente" => 7, "preco_unitario" => 200],

            ["produto" => "Herbicida A", "id_categoria" => 5, "qntd_estoque" => 300, "id_empresa_pertencente" => 1, "preco_unitario" => 75],
            ["produto" => "Inseticida B", "id_categoria" => 5, "qntd_estoque" => 200, "id_empresa_pertencente" => 2, "preco_unitario" => 65],
            ["produto" => "Adubo Líquido", "id_categoria" => 5, "qntd_estoque" => 500, "id_empresa_pertencente" => 3, "preco_unitario" => 100],
            ["produto" => "Semente Premium", "id_categoria" => 5, "qntd_estoque" => 350, "id_empresa_pertencente" => 4, "preco_unitario" => 85],
            ["produto" => "Calcário Agricola", "id_categoria" => 5, "qntd_estoque" => 450, "id_empresa_pertencente" => 5, "preco_unitario" => 50],
            ["produto" => "Saco de Cevada", "id_categoria" => 1, "qntd_estoque" => 700, "id_empresa_pertencente" => 6, "preco_unitario" => 18],
            ["produto" => "Soja Premium", "id_categoria" => 1, "qntd_estoque" => 550, "id_empresa_pertencente" => 7, "preco_unitario" => 25]
        ];

        foreach($data as $produto){
            $this->db->table("produtos")->insert($produto);
        }
    }
}

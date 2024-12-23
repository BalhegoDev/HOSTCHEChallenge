<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Clientes extends Seeder
{
    public function run()
    {
        $data = [
            [
                "nome" => "Armando",
                "email" => "armando@gmail.com",
                "senha" => password_hash("1234", PASSWORD_DEFAULT),
                "CPF" => "25022474034"
            ],
            [
                "nome" => "Beatriz",
                "email" => "beatriz@gmail.com",
                "senha" => password_hash("senha123", PASSWORD_DEFAULT),
                "CPF" => "54815451005"
            ],
            [
                "nome" => "Carlos",
                "email" => "carlos@gmail.com",
                "senha" => password_hash("carlos2024", PASSWORD_DEFAULT),
                "CPF" => "78401352061"
            ],
            [
                "nome" => "Débora",
                "email" => "debora@gmail.com",
                "senha" => password_hash("deb@2024", PASSWORD_DEFAULT),
                "CPF" => "36512143048"
            ],
            [
                "nome" => "Eduardo",
                "email" => "eduardo@gmail.com",
                "senha" => password_hash("ed_password", PASSWORD_DEFAULT),
                "CPF" => "86122763034"
            ],
            [
                "nome" => "Fernanda",
                "email" => "fernanda@gmail.com",
                "senha" => password_hash("fernanda2024", PASSWORD_DEFAULT),
                "CPF" => "46893262090"
            ],
            [
                "nome" => "Gabriel",
                "email" => "gabriel@gmail.com",
                "senha" => password_hash("gab2024", PASSWORD_DEFAULT),
                "CPF" => "98724583052"
            ],
            [
                "nome" => "Helena",
                "email" => "helena@gmail.com",
                "senha" => password_hash("helena_pass", PASSWORD_DEFAULT),
                "CPF" => "12345678909"
            ],
            [
                "nome" => "Isabela",
                "email" => "isabela@gmail.com",
                "senha" => password_hash("isa@pass2024", PASSWORD_DEFAULT),
                "CPF" => "52634195032"
            ],
            [
                "nome" => "João",
                "email" => "joao@gmail.com",
                "senha" => password_hash("joao_secure", PASSWORD_DEFAULT),
                "CPF" => "80526773052"
            ],
            [
                "nome" => "Karina",
                "email" => "karina@gmail.com",
                "senha" => password_hash("karina_123", PASSWORD_DEFAULT),
                "CPF" => "38927491002"
            ]
        ];

        foreach($data as $cliente){
            $this->db->table("clientes")->insert($cliente);
        }
    }
}

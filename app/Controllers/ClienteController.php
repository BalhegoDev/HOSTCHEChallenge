<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use CodeIgniter\HTTP\ResponseInterface;

class ClienteController extends BaseController
{

    //funções auxiliares
    protected function cpfValidate($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += $cpf[$i] * (10 - $i);
        }
        $resto = $sum % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;
    
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += $cpf[$i] * (11 - $i);
        }
        $resto = $sum % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;
    
        return $cpf[9] == $digito1 && $cpf[10] == $digito2;
    }

    protected function verifyFields(array $array,array $fields)
    {   
        foreach($fields as $value){
            if(!array_key_exists($value,$array)){
                return false;
            }
        }
        return true;
    }

    //funções para rotas

    public function insertClient()
    {
        $cliente = new Cliente();
        $body = $this->request->getJSON(true);

        if (!$body || json_last_error() !== JSON_ERROR_NONE) {
            return $this->response
            ->setJSON(["error" => "Dados inválidos"])
            ->setStatusCode(400);
        }

        if (!$this->verifyFields($body, ["nome", "email", "senha", "cpf"]) || !$this->cpfValidate($body["cpf"])) {
            return $this->response
            ->setJSON(["error" => "Campos inválidos ou CPF inválido"])
            ->setStatusCode(400);
        }

     
        $result = $cliente->insert([
            'nome'  => $body['nome'],
            'email' => $body['email'],
            'senha' => password_hash($body['senha'], PASSWORD_DEFAULT),
            'cpf'   => $body['cpf']
        ]);

        if(!$result){
            return $this->response
                ->setJSON(["error" => "Ops, usuario existente"])
                ->setStatusCode(409);
        }
        return $this->response->setJSON(["message" => "Registrado com sucesso"])->setStatusCode(201);
    }

    public function login()
    {
        $clientes = new Cliente();
        $loginRequest = $this->request->getJSON(true);

        $cliente = $clientes->where("email", $loginRequest['email'])->find();

        if (empty($cliente)) {
            return $this->response
                ->setJSON(["error" => "Email ou senha digitado incorretamente"])
                ->setStatusCode(405);
        }

        $cliente = $cliente[0];

        if (!password_verify($loginRequest['senha'], $cliente['senha'])) {
            return $this->response
                ->setJSON(["error" => "Email ou senha digitado incorretamente"])
                ->setStatusCode(405);
        }



        return $this->response
            ->setJSON(['id' => $cliente['id']])
            ->setStatusCode(200);
    }

}

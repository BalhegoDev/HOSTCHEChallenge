<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use App\Models\Empresas;
use App\Models\Produtos;
use CodeIgniter\HTTP\ResponseInterface;

class ProdutosController extends BaseController
{

    public function insertProduto()
    {
        $body = $this->request->getJSON(true);
        $produtosModel = new Produtos();
        $empresaModel = new Empresas();

        $empresaResponsavel = $empresaModel->where("id_dono",$body['user_id'])->find();

        $result = $produtosModel->insert([
            "produto" => $body['produto'],
            "id_categoria" => $body['id_categoria'],
            "qntd_estoque" => $body['qntd_estoque'],
            "preco_unitario" => $body['preco_unitario'],
            "id_empresa_pertencente" => $empresaResponsavel[0]['id']
        ]);

        if(!$result){
            return $this->response->setJSON(["error" => "Não foi possível salvar o produto"])->setStatusCode(400);
        }
        
        return $this->response->setJSON(["registrado" => true]);
    }

    public function removeProduto(int $product_id){
        $produtosModel = new Produtos();
        $produtosModel->where("id",$product_id)->delete();
    }

    public function updateProduto(int $product_id)
    {
        $produtosModel = new Produtos();
        $body = $this->request->getJSON(true);
        $produtosModel->update($product_id,$body);
    }
}

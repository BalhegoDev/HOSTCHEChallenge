<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Produtos;
use App\Models\Carrinho;
use App\Models\ProdutosVendidos;

class CompraController extends BaseController
{
    //função responsável por finalizar a compra
    //remover o produto do carrrinho
    //atualizar o BD
    public function finalizarCompra(){
        $body = $this->request->getJSON(true);
        $produtosModel = new Produtos();
        $carrinhoModel = new Carrinho();
        $produtosVendidosModel = new ProdutosVendidos();

        $produtosModel
            ->set("qntd_estoque","qntd_estoque - " . $body['qntd_estoque'],false)
            ->where("id",$body['produto_id'])
            ->update();
        
        $produtosVendidosModel->insert(
            [
                "id_empresa_pertencente" => $body['id_empresa_pertencente'],
                "id_produto" => $body['produto_id'],
                "id_cliente" => $body['user_id'],
                "valor_total" => $body['valor_total']
            ]
        );

        $carrinhoModel->where("id_produto",$body['produto_id'])->delete();

        return $this->response->setJSON(["msg" => "Deletado com sucesso !"]);
    }
}

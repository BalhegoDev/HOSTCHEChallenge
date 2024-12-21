<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Carrinho;
use App\Models\Produtos;
use CodeIgniter\HTTP\ResponseInterface;

class CarrinhoController extends BaseController
{
    public function addCarrinhoProduto()
    {
        $carrinhoModel = new Carrinho();
        $body = $this->request->getJSON(true);
        $carrinhoModel->insert($body);
    }

    //Função que retorna todos os produtos salvos no carrinho de um usuário específico 
    //Ela pega os produtos do usuário logado a partir de cada produto seu salvo na tabela 'carrinho'
    public function getClienteCarrinho(int $cliente_id)
    {   
        $carrinhoModel = new Carrinho();
        $produtosModel = new Produtos();

        $produtosCarrinho = $carrinhoModel->where("id_cliente", $cliente_id)->findAll();
        $produtos = [];

        foreach ($produtosCarrinho as $item) {
            $produtoBuscado = $produtosModel
                ->select("id,produto,id_categoria,qntd_estoque,id_empresa_pertencente")
                ->where('id', $item['id_produto'])
                ->find();

            if (isset($produtoBuscado[0])) {
                $produtoBuscado = $produtoBuscado[0];
            }

            $produtoBuscado['qntd_estoque'] = $item['quantidade'];
            $produtoBuscado['valor_total'] = $item['valor_total'];

            $produtos[] = $produtoBuscado;
        }
        
        return $this->response->setJSON($produtos)->setStatusCode(200);
    }
}

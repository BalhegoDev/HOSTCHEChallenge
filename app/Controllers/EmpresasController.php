<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cliente;
use App\Models\Empresas;
use App\Models\Produtos;
use App\Models\ProdutosVendidos;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

class EmpresasController extends BaseController
{
    //funções auxiliares
    function validateCNPJ($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
        if (strlen($cnpj) != 14) {
            return false;
        }
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        $peso1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $soma1 = 0;
    
        for ($i = 0; $i < 12; $i++) {
            $soma1 += $cnpj[$i] * $peso1[$i];
        }
    
        $resto1 = $soma1 % 11;
        $digito1 = ($resto1 < 2) ? 0 : 11 - $resto1;

        if ($cnpj[12] != $digito1) {
            return false;
        }
    
        $peso2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $soma2 = 0;
    
        for ($i = 0; $i < 13; $i++) {
            $soma2 += $cnpj[$i] * $peso2[$i];
        }
    
        $resto2 = $soma2 % 11;
        $digito2 = ($resto2 < 2) ? 0 : 11 - $resto2;
    
        if ($cnpj[13] != $digito2) {
            return false;
        }
        return true;
    }

    //função que retorna todas as empresas para a página principal
    public function getEmpresas()
    {  
        $empresa = new Empresas();
        $empresas = $empresa->findAll();

        return $this->response->setJSON($empresas)->setStatusCode(200);
    }

    public function criarEmpresa()
    {

        $body = $this->request->getJSON(true);
        $empresasModel = new Empresas();
        $body['cnpj'] = preg_replace('/[^0-9]/', '', $body['cnpj']);

        if(empty($body)){
            return $this->response
                ->setJSON(['registrado' => false]);
        }

        if(!$this->validateCNPJ($body['cnpj'])){
            return $this->response
                ->setJSON(['registrado' => false]);
        }


        $result = $empresasModel->insert([
            "nome" => $body['nome'],
            "cnpj" => $body['cnpj'],
            "id_dono" => $body['user_id']
        ]);

        if(!$result){
           return $this->response
                ->setJSON(['registrado' => false]);
        }

        return $this->response
        ->setJSON(['registrado' => true]);
    }

    public function getEmpresa()
    {
        $body = $this->request->getJSON(true);
        $empresas = new Empresas();
        $produtos = new Produtos();

        
        $resultProdutos = $produtos->where("id_empresa_pertencente",$body['id'])->findAll();
        $resultEmpresa = $empresas->find($body['id']);
        
        $response = [
            "empresa" => $resultEmpresa,
            "produtos" => $resultProdutos
        ];

        return $this->response->setJSON($response)->setStatusCode(200);    
    }

    //Rota para verificar se um cliente específico logado possui uma empresa
    public function getEmpresario(){
        $bodyRequisition = $this->request->getJSON(true);
        $cliente_id = $bodyRequisition['id'];
        $empresasModel = new Empresas();

        $result = $empresasModel
            ->where('id_dono',$cliente_id)
            ->find();

        if(empty($result)){
           return $this->response
                ->setJSON(["empresario" => false])
                ->setStatusCode(200);
        }

        return $this->response
            ->setJSON(["empresario" => true, "empresa" => $result[0]])
            ->setStatusCode(200);

    }

    //função que retorna o produtos da minha empresa quando eu entro no perfil da minha empresa
    public function getMeusProdutos()
    {
        $body = $this->request->getJSON(true);
        $empresas = new Empresas();
        $produtos = new Produtos();

        $empresaResponsavel = $empresas->where("id_dono",$body['user_id'])->find();
        if(!$empresaResponsavel){
            return $this
            ->response
            ->setJSON(["error" => "Empresa não econtrada !"])
            ->setStatusCode(500);
        }

        //Não haverá tratamento, pois pode ser que a empresa não possua nenhum produto !
        $produtosDaEmpresa = $produtos->where("id_empresa_pertencente",$empresaResponsavel[0]['id'])->findAll();
        
        return $this->response->setJSON($produtosDaEmpresa)->setStatusCode(200);
    }

    //função que retorna os produtos vendidos pela empresa que pertence ao usuário está logado
    //
    public function getProdutosVendidos(int $user_id){
        $produtosVendidosModel = new ProdutosVendidos();
        $produtosModel = new Produtos();
        $clientesModel = new Cliente();
        $empresasModel = new Empresas();
        $produtos = [];

        $empresaDonoId = $empresasModel->select("id")->where("id_dono", $user_id)->find()[0]['id'];
        $produtosVendidos = $produtosVendidosModel->where("id_empresa_pertencente",$empresaDonoId)->findAll();
        
        foreach($produtosVendidos as $produto){
            $produtoProcurado = $produtosModel->where("id",$produto['id_produto'])->find()[0];
            $clienteProcurado = $clientesModel->where("id",$produto['id_cliente'])->find()[0];

            $data = [
                "cliente" => $clienteProcurado['nome'],
                "produto" => $produtoProcurado['produto'],
                "valor_total" => $produto['valor_total'],
                "categoria" => $produtoProcurado['id_categoria']
            ];

            array_push($produtos,$data);
        }

        return $this->response->setJSON($produtos);
    }

    public function gerarProdutosPDF()
    {
        $body = $this->request->getJSON(true);

        if (!is_array($body) || empty($body)) {
            return $this->response->setJSON(['error' => 'Dados inválidos ou ausentes.'])->setStatusCode(400);
        }

        $categorias = [
            1 => "Grãos e Cereais",
            2 => "Produtos Orgânicos",
            3 => "Sementes",
            4 => "Fertilizantes",
            5 => "Outros"
        ];

        $html = '<!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>Produtos da Empresa</title>
            <style>
                body { font-family: Arial, sans-serif; }
                h1 { text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
                th { background-color: #f4f4f4; }
            </style>
        </head>
        <body>
            <h1>Produtos da Empresa</h1>
            <table>
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Produto</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade em Estoque</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($body as $produto) {
            $categoriaId = $produto['id_categoria'] ?? null;
            $categoriaNome = $categorias[$categoriaId] ?? 'Desconhecida';

            $html .= '<tr>
                <td>' . htmlspecialchars($categoriaNome) . '</td>
                <td>' . htmlspecialchars($produto['produto'] ?? '') . '</td>
                <td>R$ ' . number_format((float) ($produto['preco_unitario'] ?? 0), 2, ',', '.') . '</td>
                <td>' . htmlspecialchars($produto['qntd_estoque'] ?? 0) . '</td>
            </tr>';
        }

        $html .= '</tbody>
            </table>
        </body>
        </html>';

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfOutput = $dompdf->output();
        return $this->response->setHeader('Content-Type', 'application/pdf')
                            ->setHeader('Content-Disposition', 'attachment; filename="produtos_empresa.pdf"')
                            ->setBody($pdfOutput);
    }
}

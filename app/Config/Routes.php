<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post("/register", "ClienteController::insertClient");
$routes->post("/login", "ClienteController::login");
$routes->get("/empresas","EmpresasController::getEmpresas");
$routes->post("/empresa","EmpresasController::getEmpresa");
$routes->post("/registerEmpresa", "EmpresasController::criarEmpresa");
$routes->post("/registerProduto", "ProdutosController::insertProduto");
$routes->post("/meusProdutos", "EmpresasController::getMeusProdutos");
$routes->delete("/removeProduto/(:num)", "ProdutosController::removeProduto/$1");
$routes->put("/updateProduto/(:num)", "ProdutosController::updateProduto/$1");
$routes->post("/finalizarCompra", "CompraController::finalizarCompra");
$routes->get("/produtosCarrinho/(:num)", "CarrinhoController::getClienteCarrinho/$1");
$routes->post("/addCarrinhoProduto","CarrinhoController::addCarrinhoProduto");
$routes->get("/produtosVendidos/(:num)", "EmpresasController::getProdutosVendidos/$1");
$routes->post("/gerarPdf", "EmpresasController::gerarProdutosPDF");
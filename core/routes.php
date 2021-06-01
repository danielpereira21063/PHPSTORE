<?php

$routes = [
    'inicio'   => 'main@index',
    'loja'     => 'main@loja',

    //clientes
    'novo_cliente' => 'main@novo_cliente',

    //carrinho
    'carrinho' => 'main@carrinho',
];

$action = 'inicio';

//verifica se existe ação na query string

if(isset($_GET['a'])) {
    //verifica se a açao existe nas rotas
    if(!key_exists($_GET['a'], $routes)) {
        $action = 'inicio';
    } else {
        $action = $_GET['a'];
    }
}

//trata a definição das rotas
$url = explode('@', $routes[$action]);
$controller = 'core\\controllers\\'.ucwords($url[0]);
require_once 'controllers/'.ucwords($url[0]).'.php'; //requere o arquivo de controller
$method = $url[1];

$ctr = new $controller;
$ctr->$method();
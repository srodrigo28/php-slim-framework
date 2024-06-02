<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Cors routs
$app->options('/{routes:.+}', function($request, $response, $args){
    return $response;
});

require __DIR__ . '/routes/autenticacao.php';

require __DIR__ . '/routes/produtos.php';
require __DIR__ . '/routes/clientes.php';
require __DIR__ . '/routes/usuarios.php';

// para página não encontradas
$app->map(['GET', 'POST', 'PUT', 'PUTCH', 'DELETE'], '/routes:.+', function($req, $res){
    $handler = $this->notFoundHandler;
    return $handler($req, $res);
});
<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'vendor/autoload.php';

$app = new \Slim\App;

/*** Padrão PSR7 */
$app->get('/postagens', function(Request $req, Response $res){

    // Escrevendo no corpo da resposta utilizando o padrão PSR7
    $res->getBody()->write("Listagem de postagens");

    return $res;
});

// 
$app->post('/usuarios', function(Request $req, Response $res){
    // Recupera post ($_POST)
    $post = $req->getParsedBody();
    $nome = $post['nome'];
    $sexo = $post['sexo'];

    return $res->getBody()->write( $nome . ' - ' .  $sexo );
});

$app->run();
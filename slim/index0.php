<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);


$app->get('/header', function(Request $request, Response $response){

    $response->write('Esse é um retorno header');
    return $response->withHeader('allow', 'PUT, POST, DELETE, OPTIONS')
                        ->withHeader('Content-Length', 30);

});

$app->get('/json', function(Request $request, Response $response){
    return $response->write('{"nome" : "Sebastião Rodrigo"}');
});

$app->get('/json2', function(Request $request, Response $response){
    return $response->writeJson([
        "nome" => "Sebastião",
        "idadse" => 20
    ]);
});

// Tipos de respostas
// Cabeçalhos, JSON, Textos. XML

$app->run();
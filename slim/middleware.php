<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app->add( function($request, $response, $next){
    $response->write(' Inicio middleware 1 ');

    return $next($request, $response);
});


$app->get('/midd1', function(Request $request, Response $response){
    $response->write('Midd 01');
});

$app->get('/midd2', function(Request $request, Response $response){
    $response->write('Midd 02');
});

// Tipos de respostas
// Cabeçalhos, JSON, Textos. XML

$app->run();
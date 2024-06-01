<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

$app = new \Slim\App;

// rotas opcional
$app->get('/hello', function (Request $request, Response $response, array $args){
    echo "Hello Wolrd";
});

$app->get('/hello2/{name}', function (Request $request, Response $response, array $args){
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// http://localhost/www/app-slim/slim/v1/produtos

$app->run();
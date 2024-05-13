<?php
require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/postagens', function(){
    echo 'Listagem de postagens';
});

$app->get('/usuarios', function(){
    echo 'Listagem de usuarios';
});

$app->get('/usuarios/{id}', function($request, $response){
    $id = $request->getAttribute('id');
    echo 'Listagem de usuarios: ' . $id;
});

$app->run();
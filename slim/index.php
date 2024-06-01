<?php
require 'vendor/autoload.php';

$app = new \Slim\App;

// rotas opcional
$app->get('/postagens[/{mes}[/{ano}]]', function($req, $res){
    $mes = $req->getAttribute('mes');
    $ano = $req->getAttribute('ano');

    echo 'Listagem de postagens -- ' . $mes . '/' . $ano;
});

// pegando qualquer valor dinamicamente rota dinamica
$app->get('/lista/{itens:.*}', function($req, $res){
    $itens = $req->getAttribute('itens');
    
    echo 'Listagem de itens: '. $itens;
    // var_dump(explode("/", $itens));
});

//Criando Rota nomeadas e opcional
$app->get('/blog/postagens[/{id}]', function($req, $res){
    echo "Listagem postagens blog";
})->setName("blog");

//ususando rota noeadas
$app->get('/meusite', function($req, $res){
    $retorno = $this-> get("router") -> pathFor( "blog", ["id" => "5" ] );

    echo $retorno;
});

$app->get('/usuarios', function(){
    echo 'Listagem de usuarios';
});

$app->get('/usuarios/{id}', function($request, $response){
    $id = $request->getAttribute('id');
    echo 'Listagem de usuarios: ' . $id;
});

// agrupar rotas
$app->group('/v2', function(){

    $this->get('/usuarios', function(){
        echo "Usuários";
    });

    $this->get('/produtos', function(){
        echo "Produtos";
    });
});

// http://localhost/www/app-slim/slim/v1/produtos

$app->run();
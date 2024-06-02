<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;

/*
ORM --> Object Relational Mapper (Mapeador de objeto relacional)
*/

// // Listando produtos V2
$app->group('/api/v2', function(){
    $this->get('/produtos', function(Request $req, Response $res){
        $produtos = Produto::get();
        return $res->withJson( $produtos );
    });
    $this->get('/produtos/{id}', function($req, $res, $args){
        $produtos = Produto::findOrFail($args['id']);
        return $res->withJson($produtos);
    });
    $this->post('/produtos', function(Request $req, Response $res){
        $dados = $req->getParsedBody();
        $produto = Produto::create( $dados );
        return $res->withJson( $produto );
    });
    $this->put('/produtos/{id}', function(Request $req, Response $res, $args){
        $dados = $req->getParsedBody();
        
        $produto = Produto::findOrFail($args['id']);
        $produto->update($dados);

        return $res->withJson( $produto );
    });
    $this->delete('/produtos/{id}', function(Request $req, Response $res, $args){
        $produto = Produto::findOrFail($args['id']);
        $produto->delete();
        
        return $res->withJson( "Apagado com sucesso" );
    });
});


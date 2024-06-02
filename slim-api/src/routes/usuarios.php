<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Usuario;

/*
ORM --> Object Relational Mapper (Mapeador de objeto relacional)
*/

$app->group('/api/v2', function(){
    $this->get('/usuarios', function($req, $res){
        $usuarios = Usuario::get();
        return $res->withJson($usuarios);
    });
    $this->get('/usuarios/{id}', function($req, $res, $args){
        $usuarios = Usuario::findOrFail($args['id']);
        return $res->withJson($usuarios);
    });
    $this->post('/usuarios', function($req, $res){
        $dados = $req->getParsedBody();
        
        $usuarios = Usuario::create($dados);
        return $res->withJson($usuarios);
    });
    $this->put('/usuarios/{id}', function($req, $res, $args){
        $dados = $req->getParsedBody();

        $usuarios = Usuario::findOrFail($args['id']);
        $usuarios->update($dados);

        return $res->withJson($usuarios);
    });
    $this->delete('/usuarios/{id}', function($req, $res, $args){
        $usuarios = Usuario::findOrFail($args['id']);
        $usuarios->delete();

        return $res->withJson( "Apagado com sucesso " . $usuarios->nome);
    });
});

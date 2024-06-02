<?php

use App\Models\Cliente;

/*
ORM --> Object Relational Mapper (Mapeador de objeto relacional)
*/
$app->group('/api/v2', function(){
    $this->get('/clientes', function($req, $res){
        $clientes = Cliente::get();
        return $res->withJson($clientes);
    });
    $this->get('/clientes/{id}', function($req, $res, $args){
        $clientes = Cliente::findOrFail($args['id']);
        return $res->withJson($clientes);
    });
    $this->post('/clientes', function($req, $res){
        $dados = $req->getParsedBody();
        
        $cliente = Cliente::create($dados);
        return $res->withJson( $cliente );
    });
    $this->put('/clientes/{id}', function($req, $res, $args){
        $dados = $req->getParsedBody();

        $cliente = Cliente::findOrFail($args['id']);
        $cliente->update($dados);

        return $res->withJson( $cliente );
    });
    $this->delete('/clientes/{id}', function($req, $res, $args){
        $cliente = Cliente::findOrFail($args['id']);
        $cliente->delete();

        return $res->withJson( "Apagado com sucesso " . $cliente->nome );
    });
});

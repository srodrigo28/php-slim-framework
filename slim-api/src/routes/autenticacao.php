<?php

use App\Models\Usuario;
use Firebase\JWT\JWT;

// Gerar Tokens
$app->post('/api/v2/token', function($req, $res){

    $dados = $req->getParsedBody();

    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;

    $usuario = Usuario::where('email', $email)->first();

    if( !is_null($usuario) && (md5($senha) === $usuario->senha ) ) {
    // if( !is_null($usuario) && ($senha) === $usuario->senha ) {
        
        // gera token
        $secretKey = $this->get('settings')['secretKey'];
        $chaveAcesso = JWT::encode($usuario, $secretKey, 'HS32');

        return $res->withJson([
            'chave' => $chaveAcesso
        ]);
    }
    
    return $res->withJson([
        'status' => 'erro'
    ]);
});
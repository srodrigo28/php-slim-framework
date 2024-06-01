<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

// dependency illuminate
// github.com/illuminate/database
// lembrar de instalar no diretorio certo!
// composer require illuminate/database

// Reference: https://www.youtube.com/watch?v=wJjCA8FRGAs

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();

$container['db'] = function(){

    $capsule = new Capsule;
    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'db_slim',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};


$app->get('/usuarios', function(Request $request, Response $response) {

    /*** Criando uma tabela pelo o Slim Framework 
    $db = $this->get('db')->schema(); // faltando o c
    $db->dropIfExists('usuarios2');
    $db->create('usuarios2', function($table){
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->string('senha');
        $table->timestamps();
    });
    */
    
$db = $this->get('db');
// Inserindo registros
    // $db->table('usuarios')->insert([
    //     'nome' => 'Beto Almeida',
    //     'email' => 'betoalmeida@terra.com',
    //     'senha' => '12345678',
    // ]);

// atualizar
    // $db->table('usuarios')
    //     ->where('id', 1)
    //     ->update([
    //             'nome' => 'Maria Silva Sousa',
    //             'email' => 'email@gmail.com',
    //             'senha' => '12300123',
    //     ]);

// Delete
    // $db->table('usuarios')
    //     ->where('id', 1)
    //     ->delete();

// Listar
    // $usuarios = $db->table('usuarios')->get();
    //  echo "<h1>Listar usuarios</h1>";
    //  foreach($usuarios as $usuario){
    //     echo "Nome: " . $usuario->nome. '<br>';
    //     echo "E-mail: " . $usuario->email. '<br>';
    //     echo "Senha: " . $usuario->senha. '<br>';
    //     echo '<hr>';
    //  };

});

$app->run();
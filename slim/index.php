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
    $db = $this->get('db')->schema(); // faltando o c
    $db->dropIfExists('usuarios');
    $db->create('usuarios', function($table){
        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->string('senha');
        $table->timestamps();
    });
});

$app->run();
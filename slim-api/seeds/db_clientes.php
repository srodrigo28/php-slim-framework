<?php

/*** Pode usar direto no navegador
if(PHP_SAPI != 'cli'){
    exit('Rotar cli server');
}
*/

require __DIR__ . '/vendor/autoload.php';

$settings = require __DIR__ . '/src/settings.php';

$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'clientes';

$schema->dropIfExists($tabela);

// Criar a tabela produtos
/*** */
$schema->create($tabela, function( $tabela ){
    $tabela->increments('id');
    $tabela->string('nome', 50);
    $tabela->string('email', 60);
    $tabela->string('telefone', 50);
    $tabela->timestamps();
});
 

 $db->table($tabela)->insert([
     'nome' => 'Ana Vitória',
     'email' => 'anav@gmail.com',
     'telefone' => '(62) 9 8592-1140',
     "created_at" => '2020-02-20',
	 "updated_at" => '2020-02-20'
 ]);

 $db->table($tabela)->insert([
    'nome' => 'Bia Sousa',
    'email' => 'bsjousa@gmail.com',
    'telefone' => '(62) 9 91139-8090',
    "created_at" => '2020-02-20',
	"updated_at" => '2020-02-20'
]);

$db->table($tabela)->insert([
    'nome' => 'Carlos Silva',
    'email' => 'csilva@gmail.com',
    'telefone' => '(62) 9 7899-8877',
    "created_at" => '2020-02-20',
	"updated_at" => '2020-02-20'
]);
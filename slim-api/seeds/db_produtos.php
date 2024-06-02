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
$tabela = 'produtos';

$schema->dropIfExists($tabela);

// Criar a tabela produtos
/*** */
$schema->create($tabela, function( $tabela ){
    $tabela->increments('id');
    $tabela->string('titulo', 50);
    $tabela->string('descricao', 60);
    $tabela->string('fabricante', 50);
    $tabela->decimal('preco', 11, 2);
    $tabela->timestamps();
});
 

 $db->table($tabela)->insert([
     'titulo' => 'Moto GT OS2',
     'descricao' => 'Aparelho 1TB, Memória 32GB, 5G+, Resistente a tudo',
     'fabricante' => 'Motorola',
     'preco' => 100.00,
     "created_at" => '2020-02-20',
	 "updated_at" => '2020-02-20'
 ]);

 $db->table($tabela)->insert([
    'titulo' => 'Moto GT OS3',
    'descricao' => 'Aparelho 1TB, Memória 64GB, 5G+, Resistente a tudo',
    'fabricante' => 'Motorola',
    'preco' => 200.00,
    "created_at" => '2020-02-20',
	"updated_at" => '2020-02-20'
]);

$db->table($tabela)->insert([
    'titulo' => 'Moto GT OS2',
    'descricao' => 'Aparelho 1TB, Memória 128GB, 5G+, Resistente a tudo',
    'fabricante' => 'Motorola',
    'preco' => 300.00,
    "created_at" => '2020-02-20',
	"updated_at" => '2020-02-20'
]);
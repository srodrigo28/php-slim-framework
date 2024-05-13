### Trabalhando com PHP Slim Framework

#### Link do treinamento
    ```
    https://www.udemy.com/course/web-completo/learn/lecture/12878870#overview
    ```

    ``` ultimo visto
    https://www.udemy.com/course/web-completo/learn/lecture/12878870#overview
    ```
#### requisitos composer
    ```
    https://getcomposer.org/
    ```
#### Tipos de requisições
 * Get
 * Post
 * Delete
 * Put / Patch
#### Slim Framework Instalação
```` 
https://www.slimframework.com/
```` 
#### composer slim
````
composer require slim/slim "^3.0"
````
#### link do primeiro código
```
https://www.slimframework.com/docs/v3/
```

#### primeiro teste com slim index.php
```
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
// Define app routes
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

// Run app
$app->run();

// no navegador colocar 
// http://localhost/www/app-slim/slim/index.php/hello/bastiao
```
#### rodando o php sem o xampp
```
php -S localhost:8000
```

#### Htaccess criar um arquivo no diretorio raiz com nome .htaccess
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L]
```
* resultado com htaccess
```
http://localhost/www/app-slim/slim/hello/bastiao
```

#### Exemplo de rotas
```
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
```

#### Outras referencias
```
```
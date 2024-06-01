### Trabalhando com PHP Slim Framework
#### Link do treinamento
    ```
    https://www.udemy.com/course/web-completo/learn/lecture/12878870#overview
    ```

    ``` ultimo visto
    https://www.udemy.com/course/web-completo/learn/lecture/12878886#overview
    ```
#### 1. requisitos composer
    ```
    https://getcomposer.org/
    ```
#### 2. Tipos de requisições
 * Get
 * Post
 * Delete
 * Put / Patch
#### 3. Slim Framework Instalação
```` 
https://www.slimframework.com/
```` 
#### 4. composer slim
````
composer require slim/slim "^3.0"
````
#### 5. Rotas criadas
* Lista postagens
```
http://localhost/www/app-slim/slim/postagens
```

* Rotas dinâmicas
```
http://localhost/www/app-slim/slim/lista/usuarios
```

* Rotas multiplos parâmetros
```
http://localhost/www/app-slim/slim/postagens/jan/2024
```

* Rotas versões e agrupadas
```
http://localhost/www/app-slim/slim/v2/produtos
```
#### 6. link do primeiro código
```
https://www.slimframework.com/docs/v3/
```
#### 7. primeiro teste com slim index.php
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
#### 8. rodando o php sem o xampp
```
php -S localhost:8000
```
#### 9. Htaccess criar um arquivo no diretorio raiz com nome .htaccess
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
#### 10. Exemplo de rotas
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
#### 11. Outras referencias
```
```
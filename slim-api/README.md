# Slim Framework 3 Skeleton Application

```
https://www.udemy.com/course/web-completo/learn/lecture/12879050#questions/16131670
```

#### Criando projeto
``` Link da aula repetir
https://www.udemy.com/course/web-completo/learn/lecture/12879046#questions/14737078
```
``` Link comandos
composer create-project slim/slim-skeleton:^3.0
composer require illuminate/database
```

#### Configurar o banco de dados no arquivo src/settings.php
* colocar abaixo

```
 'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
```

* Inserir

```
// DB settigns database
'db' => [
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'db_slim',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]
```

#### Depois de configurar
```
php db.php
```

#### JWT
composer require firebase/php-jwt
#### rotas no src/routes
http://localhost/www/app-slim/slim-skeleton/public/api/v1/produtos
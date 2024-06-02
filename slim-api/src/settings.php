<?php
return [
    'settings' => [
        'displayErrorDetails' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
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
        ],

        // SecretKey
        'secretKey' => 'asfd153215asdf15asdf1515'
    ],
];

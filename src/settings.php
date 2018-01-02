<?php
return [
'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        // Monolog settings
        'logger' => [
            'name' => 'aivo-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Config facebook params
        'facebook' =>[
            'app_id' => '2084223635139334',
            'app_secret' => 'cdcda49183a048a820154e0db4ed0343',
            'token_temporal' => '2084223635139334|17CXPJgKKvMDQcCKI3XjK75jHG8'
        ]
    ],
];

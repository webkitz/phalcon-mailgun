<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'mailgun',
        'password'    => 'mailgun',
        'dbname'      => 'mailgun',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'migrationsDir'  => __DIR__ . '/../../app/migrations/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'incubator'      => __DIR__ . '/../../app/library/incubator/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'vendor'         => __DIR__ . '/../../vendor/',

        'baseUri'        => '/',
    ),
    'mailgun' => array(
        'api_key' => 'YOUR_API_KEY',
        'api_domain' => 'YOUR_API_DOMAIN'
    )
));


<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '1234',
        'dbname'      => 'vjezba',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'formsDir'       => __DIR__ . '/../../app/forms/',
        'factoryDir'     => __DIR__ . '/../../app/factories/',
        'encryptKey' => '2tx6]GD}532q4x_',
        'baseUri'        => '/vjezba/',
    )
));

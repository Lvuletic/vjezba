<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 19/03/15
 * Time: 13:37
 */

$router = new Phalcon\Mvc\Router();

$router->add(
    "/majmun",
    array(
        "controller" => "login",
        "action" => "index"
    )
);

$router->add('/{language:[a-z]{2}+}/?', array(
    'controller' => 'index',
    'action' => 'index'
));
$router->add('/{language:[a-z]{2}+}/:controller', array(
    'controller' => 2
));
$router->add('/{language:[a-z]{2}+}/:controller/:action', array(
    'controller' => 2,
    'action' => 3
));
$router->add('/{language:[a-z]{2}+}/:controller/:action/:params', array(
    'controller' => 2,
    'action' => 3,
    "params"     => 4
));

return $router;
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


$router->add("/{language:[a-z]{2}+}/welcome", array(
    "controller" => "index",
    "action" => "index"
))->setName("welcome");

$router->add("/{language:[a-z]{2}+}/orderstable", array(
    "controller" => "orderlist",
    "action" => "index"
))->setName("orderstable");

$router->add("/{language:[a-z]{2}+}/webshop", array(
    "controller" => "webcart",
    "action" => "index"
))->setName("webshop");

$router->add("/{language:[a-z]{2}+}/products", array(
    "controller" => "product",
    "action" => "index"
))->setName("products");

$router->add("/{language:[a-z]{2}+}/registration", array(
    "controller" => "customer",
    "action" => "index"
))->setName("registration");

$router->add("/{language:[a-z]{2}+}/account", array(
    "controller" => "customer",
    "action" => "account"
))->setName("account");

$router->add("/{language:[a-z]{2}+}/login", array(
    "controller" => "login",
    "action" => "index"
))->setName("login");

$router->add("/{language:[a-z]{2}+}/logout", array(
    "controller" => "login",
    "action" => "logout"
))->setName("logout");





return $router;
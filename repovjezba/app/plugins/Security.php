<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 27/02/15
 * Time: 15:40
 */

use Phalcon\Acl,
    Phalcon\Acl\Role,
    Phalcon\Acl\Resource,
    Phalcon\Events\Event,
    Phalcon\Mvc\User\Plugin,
    Phalcon\Mvc\Dispatcher;

class Security extends Plugin
{
   /* public function __construct($dependencyInjector) {
        $this->_dependencyInjector = $dependencyInjector;
    }*/

    public function getAcl()
    {
        $acl = new Phalcon\Acl\Adapter\Memory();

        $acl->setDefaultAction(Acl::DENY);

        $roles = array(
            "users" => new Role("Users"),
            "guests" => new Role("Guests"),
            "admin" => new Role("Admin")
        );

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        $privateResources = array(
            "webcart" => array("index"),
            "orders" => array("create"),
            "customer" => array("account")
        );

        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Resource($resource),$actions);
        }

        $publicResources = array(
            "index" => array("index"),
            "customer" => array("index", "register"),
            "login" => array("index", "login", "logout")
        );

        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Resource($resource),$actions);
        }

        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Users', $resource, $action);
            }
            $this->persistent->acl = $acl;
        }

        $productResource = new Resource("product");
        $pregledResource = new Resource("pregled");
        $acl->addResource($pregledResource, "index");
        $acl->addResource($productResource, array("index", "create"));
        $acl->allow("Admin", "pregled", "index");
        $acl->allow("Admin", "product", "index");
        $acl->allow("Admin", "product", "create");

        return $this->persistent->acl = $acl;
    }

    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get("auth");
        if (!$auth) {
            $role = "Guests";
        } else {
            if ($this->session->get("user_id")==1)
            {
                $role = "Admin";
            } else {
                $role = "Users";
            }
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {

            $this->flash->error("Nemate pristup ovoj stranici, molimo registrirajte se");
            $dispatcher->forward(
                array(
                    "controller" => "index",
                    "action" => "index"
                )
            );

            return false;
        }
    }
}
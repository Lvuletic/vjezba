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
            "orders" => array("create", "delete"),
            "customer" => array("account", "save"),
            "orderlist" => array("edit", "customer")
        );

        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Resource($resource),$actions);
        }

        $publicResources = array(
            "index" => array("index", "changeLanguage", "about"),
            "customer" => array("index", "register"),
            "login" => array("index", "login", "logout"),
            "orderlist" => array("index")
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
        $pregledResource = new Resource("orderlist");
        $acl->addResource($pregledResource, "index");
        $acl->addResource($productResource, array("index", "create", "delete", "edit", "save"));
        $acl->allow("Admin", "product", "index");
        $acl->allow("Admin", "product", "create");
        $acl->allow("Admin", "product", "edit");
        $acl->allow("Admin", "product", "delete");
        $acl->allow("Admin", "product", "save");
        $acl->allow("Admin", "orders", "delete");

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

        if ($controller=="orderlist" && $action=="edit")
        {
            $parameter = $dispatcher->getParam(0);
            if ($parameter)
            {
                $order = $this->factory->createObject("Orders");
                $id=$order->findCustomerId($parameter);
                $user=$this->session->get("user_id");

                if ($id!=$user)
                {
                    $this->flash->error($this->translate->_("loginnotallow"));
                    $dispatcher->forward(
                        array(
                            "controller" => "login",
                            "action" => "index"
                        )
                    );
                    return false;
                }
            } else {
                if ($this->request->isPost())
                {
                    $order = $this->factory->createObject("Orders");
                    $id = $order->findCustomerId($this->request->getPost("orderCode"));
                    if ($id!=$this->session->get("user_id"))
                    {
                        $this->flash->error($this->translate->_("loginnotallow"));
                        $dispatcher->forward(
                            array(
                                "controller" => "login",
                                "action" => "index"
                            )
                        );
                        return false;
                    }
                    if ($this->request->getPost("customerId")!=$this->session->get("user_id"))
                    {
                        $this->flash->error($this->translate->_("loginnotallow"));
                        $dispatcher->forward(
                            array(
                                "controller" => "login",
                                "action" => "index"
                            )
                        );
                        return false;
                    }
                }
            }
        }
        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $this->flash->error($this->translate->_("loginnotallow"));

            $dispatcher->forward(
                array(
                    "controller" => "login",
                    "action" => "index"
                )
            );
            return false;

        }
    }

}
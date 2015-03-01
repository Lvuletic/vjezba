<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 27/02/15
 * Time: 15:40
 */

use Phalcon\Events\Event,
    Phalcon\Mvc\User\Plugin,
    Phalcon\Mvc\Dispatcher,
    Phalcon\Acl;

class Security extends Plugin
{
    /*
    public function getAcl()
    {
        // stvori novu access control listu
        $acl = new Phalcon\Acl\Adapter\Memory();

        // default access je DENY
        $acl->setDefaultAction(Acl::DENY);

        // registriracija dviju uloga, korisnici i gosti
        $roles = array(
            "korisnici" => new Phalcon\Acl\Role("Korisnici"),
            "gosti" => new Phalcon\Acl\Role("Gosti")
        );
        // dodaj uloge u acl
        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        // resursi za backend
        $privateResources = array(
            "kosarica" => array("index", "metoda2"),
        );
        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Phalcon\Acl\Resource($resource),$actions);
        }

        // resursi za frontend
        $publicResources = array(
            "index" => array("index"),
            "prijava" => array("index", "register", "start", "end")
        );
        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Phalcon\Acl\Resource($resource),$actions);
        }

        //frontend pristup je za i goste i korisnike
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                $acl->allow($role->getName(), $resource, '*');
            }
        }

        //backend pristup je samo za korisnike
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Korisnici', $resource, $action);
            }
            $this->persistent->acl = $acl;
        }

        return $this->persistent->acl = $acl;
    }

    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        //provjera da li $auth postoji, ako da onda je to korisnik, ako ne onda je gost
        $auth = $this->session->get("auth");
        if (!$auth) {
            $role = "Gosti";
        } else {
            $role = "Korisnici";
        }

        //Take the active controller/action from the dispatcher
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        //Obtain the ACL list
        $acl = $this->getAcl();

        //radi se provjera da li $role ima pristup tom i tom controlleru i action
        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {

            // ako se nema pristup vraća ga se na pocetnu stranicu
            $this->flash->error("Nemate pristup ovoj stranici, molimo registrirajte se");
            $dispatcher->forward(
                array(
                    "controller" => "index",
                    "action" => "index"
                )
            );

            // ako se ima dopust onda se prekida rad dispatchera sa RETURN FALSE
            return false;
        }
    }

*/
}
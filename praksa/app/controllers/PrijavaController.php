<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 27/02/15
 * Time: 09:54
 */

class PrijavaController extends ControllerBase
{

    public function indexAction()
    {

    }

    private function _registerPrijava($kupac)
    {
        $this->prijava->set("auth", array(
            'sifra' => $kupac->sifra,
            'ime' => $kupac->imeprezime
        ));
    }

    public function startAction()
    {
        if ($this->request->isPost()) {
            //Receiving the variables sent by POST
            $email = $this->request->getPost("email", "email");
            $lozinka = $this->request->getPost('lozinka');

            //Find the user in the database
            $kupac = Kupac::findFirst(array(
                "email = :email: AND lozinka = :lozinka:",
                "bind" => array("email" => $email, "lozinka" => $lozinka)
            ));

            if ($kupac != false) {
                $this->_registerPrijava($kupac);
                $this->flash->success("Dobrodosli" . $kupac->imeprezime);

                //Forward to the 'invoices' controller if the user is valid
                return $this->dispatcher->forward(array(
                    "controller" => "kosarica",
                    "action" => "index"
                ));
            }

            $this->flash->error("Krivi email ili sifra");
        }

        //Forward to the login form again
        return $this->dispatcher->forward(array(
            "controller" => "prijava",
            "action" => "index"
        ));

    }

    public function endAction()
    {
        $this->prijava->remove('auth');
        return $this->forward('index/index');
    }

}
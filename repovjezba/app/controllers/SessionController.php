<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 11:56
 */

class SessionController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $this->view->form = new SessionForm();
    }
    public function loginAction()
    {
        if ($this->request->isPost()) {
            $usermail = $this->request->getPost("usermail", "email");
            $password = $this->request->getPost("password");
           /* if ($usermail == "admin" && $password == "1234")
            {
                $this->session->set("admin", "admin");
            }*/
          //  else {
            $user = User::findFirst("email = '$usermail'");

                if ($user && $this->security->checkHash($password, $user->password))
                {
                    $this->session->set("user_id", $user->id);
                    $this->cookies->set("user_id", $user->id);
                    $this->session->set("auth", array(
                        "id" => $user->id,
                        "username" => $user->username
                    ));
                    $this->flash->success("Dobrodosli " . $user->username);
                } else {
                    $this->flash->error("username ili email ili sifra su krivi");
                }
            //}

        }
        $this->dispatcher->forward(array(
            "controller" => "index",
            "action" => "index"
        ));
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->flash->success("Uspješno ste odjavljeni");
        /*return $this->dispatcher->forward(
            array(
                "controller" => "index",
                "action" => "index"
            )
        );*/
    }

}
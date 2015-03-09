<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 11:56
 */
use Customer as User;
class LoginController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->form = new LoginForm();

    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $usermail = $this->request->getPost("usermail", "email");
            $password = $this->request->getPost("password");
            $user = User::findFirst("email = '$usermail'");

                if ($user && $this->security->checkHash($password, $user->getPassword()))
                {
                    $this->session->set("user_id", $user->getId());
                    $this->cookies->set("user_id", $user->getId());
                    $this->session->set("auth", array(
                        "id" => $user->getId(),
                        "username" => $user->getUsername()
                    ));
                    $this->flash->success("Dobrodosli " . $user->getUsername());
                } else {
                    $this->flash->error("username ili email ili sifra su krivi");
                }
        }
        return $this->dispatcher->forward(array(
            "controller" => "index",
            "action" => "index"
        ));
    }

    public function logoutAction()
    {
        $this->cookies->delete("user_id");
        $this->session->remove("user_id");
        $this->session->remove("auth");
        $this->flashSession->success("Uspješno ste odjavljeni");
        return $this->response->redirect("index/index");
    }

}
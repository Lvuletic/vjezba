<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 16:19
 */

class UserController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->formUser = new UserForm();

    }

    public function accountAction()
    {
        $user = User::findFirst($this->session->get("user_id"));
        $this->view->formAccount = new AccountForm($user);
    }

    public function registerAction()
    {
        $form = new UserForm();
        if (!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }
        else
        {
            $user = new User();
            $password = $this->request->getPost('password');
            $user = $user->createNew($this->request->getPost("username"), $this->request->getPost("phone"),
                $this->request->getPost("email"), $this->request->getPost("address"), $this->security->hash($password));
            $success = $user->save();

            if ($success) {
                echo "Thanks for registering!";
            } else {
                echo "Sorry, the following problems were generated: ";
                foreach ($user->getMessages() as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }
        }
    }

    public function saveAction()
    {
        $form = new AccountForm();
        if (!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "account"
            ));
        }
        else
        {
            $user = new User();
            $user = $user->findUser($this->session->get("user_id"));
            $password = $this->request->getPost('oldPassword');
            if ($this->security->checkHash($password, $user->getPassword()) == false)
            {
                $this->flash->error("Upisali ste pogrešnu šifru kao staru šifru");
                return $this->dispatcher->forward(array(
                    "controller" => "user",
                    "action" => "account"
                ));
            }
            else
            {
                $newPassword = $this->request->getPost("newPassword");
                $user = $user->updateUser($user, $this->request->getPost("phone"), $this->request->getPost("email"),
                    $this->request->getPost("address"), $this->security->hash($newPassword));
                $success = $user->save();
                if ($success) {
                    $this->flash->notice("Vaše promjene su uspješno spremljene");
                } else {
                    echo "Sorry, the following problems were generated: ";
                    foreach ($user->getMessages() as $message) {
                        $this->flash->notice($message->getMessage());
                    }
                }

            }

        }

    }

}
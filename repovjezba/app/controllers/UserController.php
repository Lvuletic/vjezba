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

    }
    public function registerAction()
    {

        $user = new User();

        $user->setUsername($this->request->getPost("name"));
        $user->setPhone($this->request->getPost("phone"));
        $user->setEmail($this->request->getPost("email"));
        $password = $this->request->getPost('password');
        $user->setPassword($this->security->hash($password));
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
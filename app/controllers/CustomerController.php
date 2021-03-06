<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 16:19
 */

class CustomerController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->formUser = new CustomerForm();
        $this->loadTranslation("customer");

    }

    public function accountAction()
    {
        $user = Customer::findFirst($this->session->get("user_id"));
        $this->view->formAccount = new AccountForm($user);
    }

    public function registerAction()
    {
        $form = new CustomerForm();
        if (!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "customer",
                "action" => "index"
            ));
        }
        else
        {
            $this->db->begin();

            $user = $this->factory->createObject("Customer");
            $password = $this->request->getPost('password');
            $user = $user->createNew($this->request->getPost("username"), $this->request->getPost("phone"),
                $this->request->getPost("email"), $this->request->getPost("address"), $this->security->hash($password));
            if($user->save()==false)
            {
                $success = false;
                $this->db->rollback();
            } else $success = true;
            $this->db->commit();
            if ($success) {
                $this->flash->notice($this->translate->_("newregister"));
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
                "controller" => "customer",
                "action" => "account"
            ));
        }
        else
        {
            $this->db->begin();
            $user = $this->factory->createObject("Customer");
            $user = $user->findUser($this->session->get("user_id"));
            $password = $this->request->getPost('oldPassword');
            if ($this->security->checkHash($password, $user->getPassword()) == false)
            {
                $this->flash->error($this->translate->_("wrongpass"));
                return $this->dispatcher->forward(array(
                    "controller" => "customer",
                    "action" => "account"
                ));
            }
            else
            {
                $newPassword = $this->request->getPost("newPassword");
                $user = $user->updateUser($user, $this->request->getPost("phone"), $this->request->getPost("email"),
                    $this->request->getPost("address"), $this->security->hash($newPassword));
                if($user->save()==false)
                {
                    $success = false;
                    $this->db->rollback();
                } else $success = true;
                $this->db->commit();
                if ($success) {
                    $this->flash->notice($this->translate->_("changesave"));
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
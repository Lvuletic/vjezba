<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 19/03/15
 * Time: 17:29
 */

class CustomerTask extends \Phalcon\CLI\Task
{
    public function mainAction() {
        echo "\nThis is the customer task and its main action \n";
    }

    public function createAction(array $params) {
        $customer = new Customer();
        $customer->setUsername($params[0]);
        $customer->setPhone($params[1]);
        $customer->setEmail($params[2]);
        $customer->setAddress($params[3]);
        $customer->setPassword($params[4]);

        if ($customer->save() == true) {
            echo "A new customer was successfully saved \n";
        }
        else {
            foreach ($customer->getMessages() as $message)
            echo "Failure to save a new customer because of '$message'\n";
        }

    }

}
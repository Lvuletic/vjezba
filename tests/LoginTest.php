<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 19:52
 */

namespace Test;


class LoginTest extends \UnitTestCase
{
    public function testLogin()
    {

        $controller = new \LoginController();

        $controller->dispatcher->forward(array(
            "controller" => "index",
            "action" => "index"
        ));


    }

}

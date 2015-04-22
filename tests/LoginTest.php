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
        $this->assertEquals($controller->testLogin("ivo@gmail.com", "ivo73"), 11, "Jednaki su");
        $this->assertEquals($controller->testLogin("ivo@gmail.com", "ivo73"), 12, "Nisu jednaki");

    }

}

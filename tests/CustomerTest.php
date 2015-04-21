<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 19:33
 */

namespace Test;


class CustomerTest extends \UnitTestCase
{
    public function testAdd()
    {
        $user = new \Customer();
        $this->assertTrue($user->addNew(), "uspjesno dodan");
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 13:39
 */

namespace Test;

class OrdersTest extends \UnitTestCase
{
    public function testAddress()
    {
        $order = new \Orders();
        $order->findOrderByCustomer(240);

        $address = $order->getAddressDelivery();

        $this->assertClassHasAttribute("address_delivery", "Orders");
        $this->assertEquals("Vinkovci",$address, "Jednaki su");
        $this->assertEquals("Split",$address, "Nisu jednaki");
    }

}

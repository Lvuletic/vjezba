<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 12:07
 */

namespace Test;

class ProductTest extends \UnitTestCase
{
    public function testPrice()
    {
        $product = new \Product();
        $product->setPrice(100);
        $price = $product->getPrice();

        $this->assertEquals(100,$price, "Jednaki su");
        $this->assertEquals(50,$price, "Nisu jednaki");

    }

}
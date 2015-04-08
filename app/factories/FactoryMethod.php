<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 09/03/15
 * Time: 13:57
 */

class FactoryMethod
{
    public function createObject ($type)
    {
        switch ($type)
        {
            case "Customer":
                return new Customer();
                break;
            case "OrderItem":
                return new OrderItem();
                break;
            case "Orders":
                return new Orders();
                break;
            case "Product":
                return new Product();
                break;
            case "ProductType":
                return new ProductType();
                break;
            default:
                break;
        }
    }

}
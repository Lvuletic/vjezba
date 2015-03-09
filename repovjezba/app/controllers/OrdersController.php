<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 28/02/15
 * Time: 15:23
 */

use Phalcon\Forms\Element\Date;

class OrdersController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {

    }

    public function createAction()
    {
        if ($this->request->isPost() == true)
        {

            $order = new Orders();
            $order->createNew($order, $this->request->getPost("address"), $this->request->getPost("customer"));
            $order->save();
            foreach ($this->request->getPost("kosarica") as $item)
            {
                $orderItem = new OrderItem();
                $productName = substr($item, 0, -1);
                $quantity = substr($item, -1);
                $products = Product::find("name='$productName'");
                foreach ($products as $product)
                {

                    $orderItem->setProductCode($product->code);
                    $orderItem->setPrice($product->price);
                    $orderItem->setQuantity($quantity);
                    $orderItem->setTotalPrice($quantity * $product->price);
                    $order->totalPrice+=$orderItem->totalPrice;
                }

                $orderItem->setOrderCode($order->orderCode);

                if ($orderItem->save()==false)
                {
                    foreach($orderItem->getMessages() as $message)
                    {
                        echo $message;
                    }
                }
            }
            $order->save();
            $this->flash->success("Vaša narudžba je uspješno zaprimljena");
            return $this->dispatcher->forward(array("controller" => "kosarica", "action" => "index2.volt"));
        }
    }
}
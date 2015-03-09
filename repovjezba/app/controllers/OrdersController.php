<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 28/02/15
 * Time: 15:23
 */

use Phalcon\Forms\Element\Date;

class OrdersController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {

    }

    public function createAction()
    {
        if ($this->request->isPost() == true)
        {

            $order = $this->factory->createObject("Orders");
            $customer = $this->factory->createObject("Customer");
            $customerId = $this->session->get("user_id");
            $order->createNew($order, $customer->findAddress($customerId), $customerId);
            $order->save();
            $totalprice = 0;
            foreach ($this->request->getPost("webcart") as $item)
            {
                $orderItem = $this->factory->createObject("OrderItem");
                $productName = substr($item, 0, -1);
                $quantity = substr($item, -1);
                $products = Product::find("name='$productName'");
                foreach ($products as $product)
                {

                    $orderItem = $orderItem->createNew($product, $quantity);

                    $totalprice+=$orderItem->getTotalPrice();
                    $order->setTotalPrice($totalprice);
                }

                $orderItem->setOrderCode($order->getOrderCode());

                if ($orderItem->save()==false)
                {
                    foreach($orderItem->getMessages() as $message)
                    {
                        $this->flash->notice($message);
                    }
                }
            }
            $order->save();
            $this->flash->success("Vaša narudžba je uspješno zaprimljena");
            return $this->dispatcher->forward(array("controller" => "webcart", "action" => "index"));
        }
    }
}
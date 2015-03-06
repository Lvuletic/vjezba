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
    public function indexAction()
    {

    }

    public function createAction()
    {
        if ($this->request->isPost() == true)
        {

            $order = new Orders();
            $user = new User();
            $order->createNew($order, $user->findAddress($this->session->get('user_id')), $user->findUsername($this->session->get('user_id')));
            $order->save();
            foreach ($this->request->getPost("webcart") as $item)
            {
                $orderItem = new OrderItem();
                $productName = substr($item, 0, -1);
                $quantity = substr($item, -1);
                $products = Product::find("name='$productName'");
                foreach ($products as $product)
                {

                    $orderItem = $orderItem->createNew($product, $quantity);
                    $totalprice = 0;
                    $totalprice+=$orderItem->getTotalPrice();
                    $order->setTotalPrice($totalprice);
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
            return $this->dispatcher->forward(array("controller" => "webcart", "action" => "index"));
        }
    }
}
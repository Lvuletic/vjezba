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
        try {
            if ($this->request->isPost() == true) {
                $manager = new Phalcon\Mvc\Model\Transaction\Manager;
                $transaction = $manager->get();
                $order = $this->factory->createObject("Orders");
                $order->setTransaction($transaction);
                $customer = $this->factory->createObject("Customer");
                $customerId = $this->session->get("user_id");
                $order->createNew($order, $customer->findAddress($customerId), $customerId);

                if ($order->save() == false) {
                    $transaction->rollback();
                } else {
                    $transaction->commit();
                    $transaction->begin();
                    $totalprice = 0;
                    foreach ($this->request->getPost("webcart") as $item) {
                        $orderItem = $this->factory->createObject("OrderItem");
                        $orderItem->setTransaction($transaction);
                        $productName = substr($item, 0, -1);
                        $quantity = substr($item, -1);
                        $product = Product::findFirst("name='$productName'");
                        $orderItem = $orderItem->createNew($product, $quantity);
                        $totalprice += $orderItem->getTotalPrice();
                        $order->setTotalPrice($totalprice);
                        $orderItem->setOrderCode($order->getOrderCode());

                        if ($orderItem->save() == false) {
                            $transaction->rollback();
                            foreach ($orderItem->getMessages() as $message) {
                                $this->flash->notice($message);
                            }
                        }
                    }

                    if ($order->save() == false) {
                        $transaction->rollback();
                    };
                    $transaction->commit();
                    $this->flash->success($this->translate->_("ordersuccess"));
                    return $this->dispatcher->forward(array("controller" => "webcart", "action" => "index"));
                }
            }
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
            {
                echo 'Failed, reason: ', $e->getMessage();
            }
    }

    public function deleteAction($code)
    {
        $order = Orders::findFirstByOrderCode($code);
        $orderitem = $this->factory->createObject("OrderItem");
        $orderitems = $orderitem->findObject($code);
        foreach($orderitems as $item)
        {
            $item->delete();
        }
        if($order->delete()==false)
        {
            foreach($order->getMessages() as $message)
            {
                echo $message;
            }
        }
        $this->flash->success("Narudžba je uspješno pobrisana");
    }
}
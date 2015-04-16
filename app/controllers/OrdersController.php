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
        if ($this->request->isAjax() == true)
        {
            if ($this->request->getPost("data") == true)
            {
                $json = $this->request->getPost("data");
                $data = json_decode($json);
                $order = $this->factory->createObject("Orders");
                $customer = $this->factory->createObject("Customer");
                $customerId = $this->session->get("user_id");
                $order->createNew($order, $customer->findAddress($customerId), $customerId);
                $order->save();

                $totalprice = 0;
                foreach ($data as $row => $rowData) {

                    foreach($rowData as $column => $value) {
                        if (strcmp($column,"Proizvod")==0)
                        {
                            $product = Product::findFirst("name='$value'");
                        }
                        if (strcmp($column,"Količina")==0)
                        {
                            $quantity = $value;
                        }
                    }
                    $orderItem = $this->factory->createObject("OrderItem");
                    $orderItem = $orderItem->createNew($orderItem, $product, $quantity);
                    $totalprice += $orderItem->getTotalPrice();
                    $order->setTotalPrice($totalprice);
                    $orderItem->setOrderCode($order->getOrderCode());
                    if($orderItem->save()==false)
                    {
                        foreach ($orderItem->getMessages() as $message) {
                            $this->flash->notice($message);
                            return $message;
                        }
                    }

                }
                $order->save();
                $this->flash->success($this->translate->_("ordersuccess"));


                $translationPath = '../app/messages/';
                $language = $this->session->get("lang");
                require $translationPath . $language . ".php";
                $translator = new Phalcon\Translate\Adapter\NativeArray(array(
                    "content" => $messages
                ));
                $newView = $this->viewSimple;
                $content = $newView->render("webcart/webcart", array("t" => $translator));

                $response = new \Phalcon\Http\Response();
                $response->setContent($content);
                return $response;

            }

        }
    }

    public function deleteAction($code)
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $order = Orders::findFirstByOrderCode($code);
            $order->setTransaction($transaction);
            $orderitem = $this->factory->createObject("OrderItem");
            $orderitem->setTransaction($transaction);
            $orderitems = $orderitem->findObject($code);
            foreach($orderitems as $item)
            {
                if ($item->delete() == false)
                {
                    $transaction->rollback();
                } else {
                    $transaction->commit();
                    $transaction->begin();
                }
            }
            if($order->delete()==false)
            {
                $transaction->rollback();
            }
            $transaction->commit();
            $this->flash->success("Narudžba je uspješno pobrisana");
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
            {
                echo 'Failed, reason: ', $e->getMessage();
            }
    }


    /*public function createAction()
    {
        try {
            if ($this->request->isPost() == true) {
                if ($this->request->getPost("webcart")) {
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
            } else {
                    $this->flash->error("Niste napunili ičim košaricu");
                    return $this->dispatcher->forward(array("controller" => "webcart", "action" => "index"));
                }}
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
            {
                echo 'Failed, reason: ', $e->getMessage();
            }
    }*/
}
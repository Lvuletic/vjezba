<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\View;
class OrderListController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        if ($this->request->isAjax() == true)
        {
            if ($this->request->getPost("page", "int") == true)
            {
                $numberNewPage = $this->request->getPost("page", "int");
                $orders = new Orders();
                $newData = $orders->findOrderCustomer();
                $newPaginator = new Paginator(array(
                    "data" => $newData,
                    "limit" => 5,
                    "page" => $numberNewPage
                ));

            /*$view->start();
          //  $view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            $view->render('orderlist', 'index', array("ordersPage" => $newPaginator->getPaginate()));
            $view->finish();
            $content = $view->getContent();*/

                $translationPath = '../app/messages/';
                $language = $this->session->get("lang");
                require $translationPath . $language . ".php";
                $translator = new Phalcon\Translate\Adapter\NativeArray(array(
                    "content" => $messages
                ));

                $newView = $this->viewSimple;
                $newView->form = new ListForm();
                $content = $newView->render("orderlist/orders", array("ordersPage" => $newPaginator->getPaginate(), "t" => $translator));

            // $view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            // $view->partial("orderlist/index", array( "ordersPage" => $newPaginator->getPaginate()));
            // $content = $view->getRender("orderlist", "index", array( "ordersPage" => $newPaginator->getPaginate()));

                $response = new \Phalcon\Http\Response();
                $response->setContent($content);
                return $response;
            }
            else if ($this->request->getPost("code", "int") == true)
            {
                $code = $this->request->getPost("code" , "int");
                $orderItem = $this->factory->createObject("OrderItem");
                $items = $orderItem->findOrderItemProduct($code);

                $newView = $this->viewSimple;
                $newView->form = new ListForm();
                $content = $newView->render("orderlist/orderitems", array("orderItems" => $items));

                $response = new \Phalcon\Http\Response();
                $response->setContent($content);
                return $response;
            }
        }

        $numberPage = 1;
        $orders = new Orders();
        $orders = $orders->findOrderCustomer();
        $paginator = new Paginator(array(
            "data" => $orders,
            "limit" => 5,
            "page" => $numberPage
        ));
        $this->view->ordersPage = $paginator->getPaginate();

        $this->view->form = new ListForm();

        /*
        $cache = $this->modelsCache;
        $orders = $cache->get("order-cache");
        if ($orders === null)
        {
            $orders = $this->factory->createObject("Orders");
            $orders = Orders::find();
            $cache->save("order-cache", $orders, 15);
        }
        */

    }

    public function editAction($code)
    {
        if ($this->request->isPost())
        {
            $code = $this->request->getPost("orderCode", "int");

            $order = Orders::findFirstByOrderCode($code);

            $order->setCustomerId($this->request->getPost("customerId", "int"));
            $order->setAddressDelivery($this->request->getPost("address", "string"));
            $order->setTotalPrice($this->request->getPost("totalPrice"));
            $order->setDate($this->request->getPost("date"));

            if ($order->save()==false)
            {
                foreach($order->getMessages() as $message)
                {
                    echo $message;
                }
            }
            else $this->flash->success($this->translate->_("ordereditsuccess"));
        }
        $order = Orders::findFirstByOrderCode($code);

        $this->view->formOrderEdit = new OrderEditForm();

        $this->tag->setDefault("orderCode", $order->getOrderCode());
        $this->tag->setDefault("customerId", $order->getCustomerId());
        $this->tag->setDefault("address", $order->getAddressDelivery());
        $this->tag->setDefault("totalPrice", $order->getTotalPrice());
        $this->tag->setDefault("date", $order->getDate());
    }

    public function saveAction()
    {

    }

    public function customerAction()
    {
        if ($this->request->isAjax() == true)
        {
            if ($this->request->getPost("page", "int") == true)
            {
                $numberNewPage = $this->request->getPost("page", "int");
                $neworders = $this->factory->createObject("Orders");
                $neworders = $neworders->findAllByCustomer($neworders, $this->session->get("user_id"));
                $newPaginator = new Paginator(array(
                    "data" => $neworders,
                    "limit" => 5,
                    "page" => $numberNewPage
                ));

                $translationPath = '../app/messages/';
                $language = $this->session->get("lang");
                require $translationPath . $language . ".php";
                $translator = new Phalcon\Translate\Adapter\NativeArray(array(
                    "content" => $messages
                ));

                $newView = $this->viewSimple;
                $content = $newView->render("orderlist/customerorders", array("customerPage" => $newPaginator->getPaginate(), "t" => $translator));

                $response = new \Phalcon\Http\Response();
                $response->setContent($content);
                return $response;
            }
            else if ($this->request->getPost("code", "int") == true)
            {
                $code = $this->request->getPost("code" , "int");
                $orderItem = $this->factory->createObject("OrderItem");
                $items = $orderItem->findOrderItemProduct($code);

                $newView = $this->viewSimple;
                $content = $newView->render("orderlist/orderitems", array("orderItems" => $items));

                $response = new \Phalcon\Http\Response();
                $response->setContent($content);
                return $response;
            }
        }
        $numberPage = 1;
        $orders = $this->factory->createObject("Orders");
        $orders = $orders->findAllByCustomer($orders, $this->session->get("user_id"));
        $paginator = new Paginator(array(
            "data" => $orders,
            "limit" => 5,
            "page" => $numberPage
        ));
        $this->view->customerPage = $paginator->getPaginate();

    }

}

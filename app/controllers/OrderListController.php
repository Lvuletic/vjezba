<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */
use Phalcon\Paginator\Adapter\Model as Paginator;
class OrderListController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->loadTranslation("orderlist");

        $this->view->form = new ListForm();

        $cache = $this->modelsCache;
        $orders = $cache->get("order-cache");
        if ($orders === null)
        {
               // $orders = $this->factory->createObject("Orders");
            $orders = Orders::find();
            $cache->save("order-cache", $orders, 15);
        }

        $numberPage = 1;

        if ($this->request->isPost()) {
            $numberPage = $this->request->get("page", "int");

        } else {
            $numberPage = $this->request->get("page", "int");
        }


        $paginator = new Paginator(array(
            "data" => $orders,
            "limit"=> 5,
            "page" => $numberPage
        ));
        $this->view->ordersPage = $paginator->getPaginate();

            //$this->view->ordersPage = $orders;



        $request = new Phalcon\Http\Request();
        $code = $request->get('code');
        $orderItem = $this->factory->createObject("OrderItem");
        $items = $orderItem->findOrderItemProduct($code);

        $this->view->orderItems = $items;

    }

}

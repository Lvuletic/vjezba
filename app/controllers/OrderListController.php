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

        $numberPage = $this->request->get("page", "int");
        $orders = Orders::find();
        $paginator = new Paginator(array(
            "data" => $orders,
            "limit"=> 5,
            "page" => $numberPage
        ));
        $this->view->ordersPage = $paginator->getPaginate();

        $this->view->form = new ListForm();

       // $cache = $this->modelsCache;
       // $orders = $cache->get("order-cache");
       // if ($orders === null)
       // {
               // $orders = $this->factory->createObject("Orders");
        $orders = Orders::find();
       //     $cache->save("order-cache", $orders, 15);
       // }

        $numberPage = 1;

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

    public function newpageAction()
    {
        $page = $this->request->get("page");
        $offset = $page*10;
        $phql = "SELECT * FROM Orders LIMIT 15, 10";
        $query = $this->modelsManager->createQuery($phql);
        $items = $query->execute();
        /*
        $results = array();
        while ($row = mysqli_fetch_array($items))
        {
            $results[]=array(
                "orderCode" => $row["order_code"],
                "customerId" => $row["customerId"],
                "address" => $row["address"],
                "totalPrice" => $row["totalPrice"],
                "date" => $row["date"]
            );
        }
        */
        $response = new \Phalcon\Http\Response();
        $response->setJsonContent($items);
        return $response;
    }
}

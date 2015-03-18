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
            $numberNewPage = $this->request->getPost("page", "int");
            $newData = Orders::find();
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
            $content = $newView->render("orderlist/index", array("ordersPage" => $newPaginator->getPaginate(), "t" => $translator));

            // $view->setRenderLevel(View::LEVEL_ACTION_VIEW);
            // $view->partial("orderlist/index", array( "ordersPage" => $newPaginator->getPaginate()));
            // $content = $view->getRender("orderlist", "index", array( "ordersPage" => $newPaginator->getPaginate()));

            $response = new \Phalcon\Http\Response();
            //$response->setContent($this->view->start()->render('orderlist', 'index'));
            $response->setContent($content);
            return $response;
        }

        $numberPage = 1;
        $orders = Orders::find();
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

        $request = new Phalcon\Http\Request();
        $code = $request->get('code');
        $orderItem = $this->factory->createObject("OrderItem");
        $items = $orderItem->findOrderItemProduct($code);

        $this->view->orderItems = $items;

    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */

class PregledController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $this->view->form = new PregledForm;
        $ordersNumberPage = 1;
        $orders = Orders::find();

        $ordersPaginator = new Phalcon\Paginator\Adapter\Model(array(
            "data" => $orders,
            "limit" =>50,
            "page" => $ordersNumberPage
        ));

        $this->view->ordersPage = $ordersPaginator->getPaginate();
        
        $numberpageS = 1;
        $request = new Phalcon\Http\Request();
        $orderItem = new OrderItem();
        $items = $orderItem->findItem($request->get('code'));

        $paginatorS = new Phalcon\Paginator\Adapter\Model(array(
            "data" => $items,
            "limit" => 20,
            "page" => $numberpageS
        ));

        $this->view->orderItemPage = $paginatorS->getPaginate();
    }

}

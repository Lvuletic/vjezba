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

        $request = new Phalcon\Http\Request();
        $code = $request->get('code');
        $phql = "SELECT OrderItem.*, Product.name FROM OrderItem JOIN Product ON OrderItem.orderCode = '$code' AND OrderItem.productCode = Product.code";
        $query = $this->modelsManager->createQuery($phql);
        $items = $query->execute();

        $this->view->orderItems = $items;

    }

}

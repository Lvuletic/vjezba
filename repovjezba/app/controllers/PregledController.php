<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */

class PregledController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->form = new PregledForm;
        $orders = new Orders();
        $orders = $orders->findOrderCustomer();

        $this->view->ordersPage = $orders;

        $request = new Phalcon\Http\Request();
        $code = $request->get('code');
        $orderItem = new OrderItem();
        $items = $orderItem->findOrderItemProduct($code);

        $this->view->orderItems = $items;

    }

}

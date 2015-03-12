<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */

class PregledController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->loadTranslation("pregled");

            $this->view->form = new PregledForm;

            $cache = $this->modelsCache;
            $orders = $cache->get("order-cache");
            if ($orders === null)
            {
                // $orders = $this->factory->createObject("Orders");
                $orders = Orders::find();
                $cache->save("order-cache", $orders, 15);
            }
            $this->view->ordersPage = $orders;


            $request = new Phalcon\Http\Request();
            $code = $request->get('code');
            $orderItem = $this->factory->createObject("OrderItem");
            $items = $orderItem->findOrderItemProduct($code);

            $this->view->orderItems = $items;




    }
}

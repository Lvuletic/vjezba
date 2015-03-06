<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 26/02/15
 * Time: 21:15
 */

class WebCartController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->formProduct = new ProductForm();
        $this->view->formWebCart = new WebCartForm();

    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 26/02/15
 * Time: 21:15
 */

class WebCartController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->formProduct = new ProductListForm();
        $this->view->formWebCart = new WebCartForm();
        $this->loadTranslation("webcart");

    }

}

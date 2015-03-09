<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 09/03/15
 * Time: 15:44
 */

class ProductController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->form = new ProductForm();
    }

    public function createAction()
    {

    }

}
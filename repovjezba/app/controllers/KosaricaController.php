<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 26/02/15
 * Time: 21:15
 */

class KosaricaController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $this->view->form = new ProductForm();
        $this->view->form2 = new KosaricaForm();

    }

}

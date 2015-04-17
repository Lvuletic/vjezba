<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 26/02/15
 * Time: 21:15
 */
use Phalcon\Paginator\Adapter\Model as Paginator;
class WebCartController extends ControllerBase
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
            $products = Product::find();
            $newPaginator = new Paginator(array(
                "data" => $products,
                "limit" => 50,
                "page" => $numberNewPage
            ));

            $newView = $this->viewSimple;
            $content = $newView->render("webcart/shoplist", array("productPage" => $newPaginator->getPaginate()));

            $response = new \Phalcon\Http\Response();
            $response->setContent($content);
            return $response;
        }

        $this->view->formProduct = new ProductListForm();
        $this->view->formWebCart = new WebCartForm();

        $products = Product::find();
        $numberPage = 1;
        $paginator = new Paginator(array(
            "data" => $products,
            "limit" => 50,
            "page" => $numberPage
        ));
        $this->view->productPage = $paginator->getPaginate();

    }

}

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
        $product = $this->factory->createObject("Product");
        $products = $product->findProductType();
        $this->view->form = new ProductForm();
        $this->view->productsList = $products;

    }

    public function createAction()
    {

        if ($this->request->isPost() == true) {
            $product = $this->factory->createObject("Product");
            $name = $this->request->getPost("name");
            $price = $this->request->getPost("price");
            $type = $this->request->getPost("type");
            $product->createNew($product, $name, $price, $type);

            if ($product->save() == false)
            {
                foreach ($product->getMessages() as $message) {
                    $this->flash->notice($message);
                }
            }
            $this->flash->success($this->translate->_("productsuccess"));
            return $this->dispatcher->forward(array("controller" => "product", "action" => "index"));
        }



    }

    public function editAction($code)
    {
        $product = Product::findFirstByCode($code);

        $this->view->formProductEdit = new ProductEditForm();

        $this->tag->setDefault("code", $product->getCode());
        $this->tag->setDefault("name", $product->getName());
        $this->tag->setDefault("price", $product->getPrice());
        $this->tag->setDefault("editType", $product->findTypeDescription($product->getType()));

    }

    public function saveAction()
    {
        $code = $this->request->getPost("code", "int");

        $product = Product::findFirstByCode($code);
        $product->setName($this->request->getPost("name"));
        $product->setPrice($this->request->getPost("price"));
        $product->setType($this->request->getPost("editType"));

        if ($product->save()==false)
        {
            foreach($product->getMessages() as $message)
            {
                echo $message;
            }
        }
        else $this->flash->success($this->translate->_("producteditsuccess"));
    }

    public function deleteAction($code)
    {
        $product = Product::findFirst($code);

        if($product->delete()==false)
        {
            foreach($product->getMessages() as $message)
            {
                echo $message;
            }
        }
        $this->flash->success("Delete successful");
    }

}
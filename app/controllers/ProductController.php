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
        try {
            if ($this->request->isPost() == true) {
                $manager = new Phalcon\Mvc\Model\Transaction\Manager;
                $transaction = $manager->get();
                $product = $this->factory->createObject("Product");
                $product->setTransaction($transaction);
                $name = $this->request->getPost("name");
                $price = $this->request->getPost("price");
                $type = $this->request->getPost("type");
                $product->createNew($product, $name, $price, $type);

                if ($product->save() == false)
                {
                    $transaction->rollback();
                    foreach ($product->getMessages() as $message) {
                        $this->flash->notice($message);
                    }
                }
                $transaction->commit();
                $this->flash->success($this->translate->_("productsuccess"));
                return $this->dispatcher->forward(array("controller" => "product", "action" => "index"));
            }

        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
            {
                echo 'Failed, reason: ', $e->getMessage();
            }

    }

    public function editAction($code)
    {
        $product = Product::findFirstByCode($code);

        $this->view->formProductEdit = new ProductEditForm();

        $this->tag->setDefault("code", $product->getCode());
        $this->tag->setDefault("name", $product->getName());
        $this->tag->setDefault("price", $product->getPrice());
        $this->tag->setDefault("type", $product->findTypeDescription($product->getType()));
    }

    public function saveAction()
    {
        $code = $this->request->getPost("code", "int");

        $product = Product::findFirstByCode($code);
        $type = $product->findTypeId($this->request->getPost("type"));
        $product->setName($this->request->getPost("name"));
        $product->setPrice($this->request->getPost("price"));
        $product->setType($type);

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
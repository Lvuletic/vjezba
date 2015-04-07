<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\NativeArray as Paginator;

class StoreController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for store
     */
    public function searchAction()
    {

        $numberPage = 1;
        /*if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Store", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "store_id";

        $store = Store::find($parameters);
        if (count($store) == 0) {
            $this->flash->notice("The search did not find any store");

            return $this->dispatcher->forward(array(
                "controller" => "store",
                "action" => "index"
            ));
        }*/

       $store = Store::find();

        $paginator = new Paginator(array(
            "data" => $store,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Creates a new store
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "store",
                "action" => "index"
            ));
        }

        $store = new Store();

        $store->location = $this->request->getPost("location");
        $store->size = $this->request->getPost("size");
        $store->address = $this->request->getPost("address");


        if (!$store->save()) {
            foreach ($store->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "store",
                "action" => "new"
            ));
        }

        $this->flash->success("store was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "store",
            "action" => "index"
        ));

    }
}

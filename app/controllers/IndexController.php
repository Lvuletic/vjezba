<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {

  //      $this->view->cache(array("lifetime" => 3600, "key" => "index-cache"));

    }

    public function changeLanguageAction($lang)
    {
        $this->session->set("lang", $lang);
        $referer = $this->request->getHTTPReferer();
        return $this->response->setHeader("Location", $referer);
    }


}

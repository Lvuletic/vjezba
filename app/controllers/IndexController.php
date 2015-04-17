<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {

      // $this->view->cache(array("lifetime" => 3600, "key" => "index-cache"));
    }

    public function changeLanguageAction($lang)
    {

        //$this->dispatcher->setParam("language", $lang);
        //$referer = $this->request->getHTTPReferer();
        //$this->session->set("lang", $lang);
        //return $this->response->redirect($referer, true);
        //return $this->response->setHeader("Location", $referer);
        $this->response->redirect(array(
            "for" => "welcome",
            "language" => $lang
        ),null);


    }

    public function aboutAction()
    {

    }
}

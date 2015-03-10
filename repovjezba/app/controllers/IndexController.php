<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        // $this->flash->notice($this->session->get("user_id"));
        // $this->flash->notice($this->session->get("auth"));
        // $this->flash->notice($this->session->get("lang"));
        $this->loadTranslation("index");
    }

    public function changeLanguageAction($lang)
    {
        $this->session->set("lang", $lang);
        $referer = $this->request->getHTTPReferer();
        return $this->response->setHeader("Location", $referer);
    }

}

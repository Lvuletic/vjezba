<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction($word)
    {
        // $this->flash->notice($this->session->get("user_id"));
        // $this->flash->notice($this->session->get("auth"));
        // $this->flash->notice($this->session->get("lang"));
        $this->loadTranslation("index");
        $this->changeStringAction($word);
    }

    public function changeLanguageAction($lang)
    {
        $this->session->set("lang", $lang);
        $referer = $this->request->getHTTPReferer();
        return $this->response->setHeader("Location", $referer);
    }

    public function changeStringAction($word)
    {
        $this->view->word = $word;
    }

}

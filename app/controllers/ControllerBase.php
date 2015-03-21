<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize() {
        $this->assets
            ->addJs("js/jquery.min.js")
            ->addJs("js/table.js")
            ->addJs("js/webcart.js");
        $this->assets->addCss("css/tables.css");
        $this->tag->setDoctype(\Phalcon\Tag::HTML5);
        $this->loadTranslation();
    }

    public function loadTranslation()
    {
        $translationPath = '../app/messages/';
       // $language = $this->session->get("lang");
        $language = $this->dispatcher->getParam("language");
        if (!$language)
        {
           // $this->dispatcher->setParam("language", "en");
            $this->session->set("lang", "en");
            $language = "en";
        }
        require $translationPath.$language.".php";
        $translator = new Phalcon\Translate\Adapter\NativeArray(array(
            "content" => $messages
        ));

        $this->view->setVar("t", $translator);
    }
}

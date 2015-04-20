<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize() {
        $this->assets
            ->addJs("js/jquery.min.js")
            ->addJs("js/table.js")
            ->addJs("js/webcart.js")
            ->addJs("js/edit.js")
            ->addJs("js/jquery-ui.min.js")
            ->addJs("js/bootstrap.js")
            ->addJs("js/bootstrap.min.js");
        $this->assets
            ->addCss("css/tables.css")
            ->addCss("css/jquery-ui.min.css")
            ->addCss("css/bootstrap.css")
            ->addCss("css/bootstrap-theme.css")
            ->addCss("css/bootstrap.css.map")
            ->addCss("css/bootstrap-theme.css.map");

        $this->tag->setDoctype(\Phalcon\Tag::HTML5);
        $this->loadTranslation();
    }

    public function loadTranslation()
    {
        $translationPath = '../app/messages/';
        //$language = $this->session->get("lang");
        $language = $this->dispatcher->getParam("language");
        if (!$language)
        {
            $this->dispatcher->setParam("language", "en");
            //$this->session->set("lang", "en");
            $language = "en";
        }
        require $translationPath.$language.".php";
        $translator = new Phalcon\Translate\Adapter\NativeArray(array(
            "content" => $messages
        ));

        $this->view->setVar("t", $translator);
    }
}

<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize() {
        $this->assets
            ->addJs("js/jquery.min.js")
            ->addJs("js/tablica.js")
            ->addJs("js/webcart.js");
        $this->assets->addCss("css/stilovi.css");
        $this->tag->setDoctype(\Phalcon\Tag::HTML5);
    }

    public function loadTranslation($translationFile)
    {
        $translationPath = '../app/messages/';
        $language = $this->session->get("lang");
        if (!$language)
        {
            $this->session->set("lang", "en");
            $language = $this->session->get("lang");
        }
        require $translationPath.$language."/".$translationFile.".php";
        $translator = new Phalcon\Translate\Adapter\NativeArray(array(
            "content" => $messages
        ));

        $this->view->setVar("t", $translator);
    }
}

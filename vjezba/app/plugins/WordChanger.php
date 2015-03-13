<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 11/03/15
 * Time: 10:29
 */

use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

class WordChanger extends Plugin
{
    public function afterRender(Event $event, View $view)
    {
        $contents = (string)$view->getContent();
        $contents = str_replace("ipsum", "CICOSTOS", $contents);
        $view->setContent($contents);
    }

}
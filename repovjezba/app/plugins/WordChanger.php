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
    public function beforeDispatchLoop(Event $event, Dispatcher $dispatcher)
    {
        /*$contents = $view->getContent();
        $filter = new Phalcon\Filter();
        $filter->sanitize($contents, "striptags");
        $contents = str_replace("ipsum", "CICOSTOS", $contents);
        $view->setContent($contents);*/

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        if ($controller == "index" && $action == "index")
        {
            $word = array("CICOSTOS");
            $dispatcher->setParams($word);
        }

    }

}
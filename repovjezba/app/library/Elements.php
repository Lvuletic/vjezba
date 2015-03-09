<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 28/02/15
 * Time: 09:36
 */

use Phalcon\Mvc\User\Component;

class Elements extends Component
{
    private $_headerMenu = array(
        'navbar-left' => array(
            'index2' => array(
                'caption' => 'glavna stranica',
                'action' => 'index'
            ),
            'pregled' => array(
                'caption' => 'pregled narudžbi',
                'action' => 'index2'
            ),
            'kosarica' => array(
                'caption' => 'web kupovina',
                'action' => 'index2'
            ),
            'user' => array(
                'caption' => 'kupci',
                'action' => 'index2'
            ),
        ),
        'navbar-right' => array(
            'login' => array(
                'caption' => 'prijava',
                'action' => 'index2'
            ),
        )
    );

    public function getMenu()
    {
        $auth = $this->session->get('auth');
        $user = $auth["username"];
        if ($auth) {
            $this->_headerMenu['navbar-right']['login'] = array(
                'caption' => 'odjava',
                'action' => 'logout'
            );
            echo "prijavljeni ste kao $user";
        } else {
            unset($this->_headerMenu['navbar-left']['user']);
        }

        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }


    }

}
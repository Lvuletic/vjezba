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
    public $_headerMenu = array(
            'index' => array(
                'caption' => 'glavna stranica',
                'action' => 'index'
            ),
            'pregled' => array(
                'caption' => 'pregled narudžbi',
                'action' => 'index'
            ),
            'webcart' => array(
                'caption' => 'web kupovina',
                'action' => 'index'
            ),
            'user' => array(
                'caption' => 'registracija',
                'action' => 'index'
            ),
            'login' => array(
                'caption' => 'prijava',
                'action' => 'index'
            ),
        );


    public function getMenu()
    {
        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-left']['user'] = array(
                'caption' => 'vaš račun',
                'action' => 'account'
            );
            $this->_headerMenu['navbar-right']['login'] = array(
                'caption' => 'odjava',
                'action' => 'logout'
            );
        }
    }

}
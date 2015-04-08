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
    /*public $_headerMenu = array(
            'index' => array(
                'caption' => 'glavna stranica',
                'action' => 'index'
            ),
            'orderlist' => array(
                'caption' => 'pregled narudžbi',
                'action' => 'index'
            ),
            'webcart' => array(
                'caption' => 'web kupovina',
                'action' => 'index'
            ),
            'product' => array(
                'caption' => 'proizvodi',
                'action' => 'index'
            ),
            'customer' => array(
                'caption' => 'registracija',
                'action' => 'index'
            ),
            'login' => array(
                'caption' => 'prijava',
                'action' => 'index'
            ),
        );*/

    public $_headerMenu = array(
        'welcome' => array(
            'caption' => 'glavna stranica',
            'route' => 'welcome'
        ),
        'orderstable' => array(
            'caption' => 'pregled narudžbi',
            'route' => 'orderstable'
        ),
        'webshop' => array(
            'caption' => 'web kupovina',
            'route' => 'webshop'
        ),
        'products' => array(
            'caption' => 'proizvodi',
            'route' => 'products'
        ),
        'registration' => array(
            'caption' => 'registracija',
            'route' => 'registration'
        ),
        'login' => array(
            'caption' => 'prijava',
            'route' => 'login'
        ),
    );

    public function getMenu()
    {
        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['registration'] = array(
                'caption' => 'vaš račun',
                'route' => 'account',
                'action' => 'account'
            );
            $this->_headerMenu['login'] = array(
                'caption' => 'odjava',
                'route' => 'logout',
                'action' => 'logout'
            );
        }
    }
}
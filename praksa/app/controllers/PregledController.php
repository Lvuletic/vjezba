<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */

class PregledController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $numberpageN = 1;
        $narudzbe = Narudzba::find();

        $paginatorN = new Phalcon\Paginator\Adapter\Model(array(
            "data" => $narudzbe,
            "limit" =>50,
            "page" => $numberpageN
        ));

        $this->view->pageN = $paginatorN->getPaginate();
        
        $numberpageS = 1;
        $request = new Phalcon\Http\Request();
        $stavka = new Stavka();
        $stavke = $stavka->findStavka($request->get('sifra'));

        $paginatorS = new Phalcon\Paginator\Adapter\Model(array(
            "data" => $stavke,
            "limit" => 20,
            "page" => $numberpageS
        ));

        $this->view->pageS = $paginatorS->getPaginate();

    }

}

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

    }

    public function izracunAction()
    {

        $sifra = $this->request->getPost("sifra");
        $stavke = Stavka::find("sifra_N='$sifra'");
        foreach($stavke as $stavka)
        {
            echo $stavka->naziv_A;
        }
        dodajRed("aaa");

    }
}
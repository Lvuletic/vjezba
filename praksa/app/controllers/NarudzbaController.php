<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 28/02/15
 * Time: 15:23
 */

use Phalcon\Forms\Element\Date;

class NarudzbaController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {

    }

    public function stvoriAction()
    {

        $datum = date("Y-m-d");
        $narudzba = new Narudzba();
        $narudzba->setAdresaDostava($_POST["AdresaKupca"]);
        $narudzba->setImeKupca($_POST["ImeKupca"]);
        $narudzba->setUkupnaCijena(0);
        $narudzba->setDatum($datum);
        $narudzba->save();
        foreach ($_POST["kosarica"] as $item)
        {
            $stavka = new Stavka();
            $stavka->setNazivA($item);

            $artikli = Artikal::find("naziv='$item'");
            foreach ($artikli as $jedan)
            {
                $jedan->kolicina--;
                $jedan->save();

                $stavka->setSifraA($jedan->sifra);
                $stavka->setUkupnaCijena($jedan->cijena);
                $narudzba->ukupna_cijena+=$jedan->cijena;
            }

            $stavka->setSifraN($narudzba->sifra_N);

            if ($stavka->save()==false)
            {
                foreach($stavka->getMessages() as $message)
                {
                    echo $message;
                }
            }
        }
        $narudzba->save();
        echo "Vaša narudžba je uspješno zaprimljena, za povratak na glavnu stranicu kliknite ";
        echo Phalcon\Tag::linkTo("index", "ovdje");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 28/02/15
 * Time: 15:26
 */

class Stavka extends \Phalcon\Mvc\Model
{
    public $naziv_A;
    public $sifra_A;
    public $sifra_N;
    public $ukupna_cijena;

   /* public function initialize()
    {
        $this->setSource("stavka_narudzba");
    }*/

    public function getSource()
    {
        return "stavka_narudzba";
    }

    /**
     * @param mixed $naziv_A
     */
    public function setNazivA($naziv_A)
    {
        $this->naziv_A = $naziv_A;
    }

    /**
     * @param mixed $sifra_N
     */
    public function setSifraN($sifra_N)
    {
        $this->sifra_N = $sifra_N;
    }

    /**
     * @param mixed $ukupna_cijena
     */
    public function setUkupnaCijena($ukupna_cijena)
    {
        $this->ukupna_cijena = $ukupna_cijena;
    }

    /**
     * @return mixed
     */

    public function setSifraA($sifra_A)
    {
        $this->sifra_A = $sifra_A;
    }

    public function findStavka($sifra)
    {
        $stavke = Stavka::find("sifra_N='$sifra'");
        return $stavke;
    }

}
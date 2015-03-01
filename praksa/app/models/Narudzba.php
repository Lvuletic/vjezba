<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 28/02/15
 * Time: 15:27
 */

class Narudzba extends \Phalcon\Mvc\Model
{
    public $sifra_N;
    public $ime_kupca;
    public $adresa_dostava;
    public $ukupna_cijena;
    public $datum;


    /**
     * @param mixed $ime_kupca
     */
    public function setImeKupca($ime_kupca)
    {
        $this->ime_kupca = $ime_kupca;
    }

    /**
     * @param mixed $adresa_dostava
     */
    public function setAdresaDostava($adresa_dostava)
    {
        $this->adresa_dostava = $adresa_dostava;
    }

    /**
     * @param mixed $ukupna_cijena
     */
    public function setUkupnaCijena($ukupna_cijena)
    {
        $this->ukupna_cijena = $ukupna_cijena;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @param mixed $sifra_N
     */
    public function setSifraN($sifra_N)
    {
        $this->sifra_N = $sifra_N;
    }


}
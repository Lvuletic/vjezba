<?php

class Narudzba extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sifra_N;

    /**
     *
     * @var string
     */
    public $ime_kupca;

    /**
     *
     * @var string
     */
    public $adresa_dostava;

    /**
     *
     * @var double
     */
    public $ukupna_cijena;

    /**
     *
     * @var string
     */
    public $datum;

    /**
     * Method to set the value of field sifra_N
     *
     * @param integer $sifra_N
     * @return $this
     */
    public function setSifraN($sifra_N)
    {
        $this->sifra_N = $sifra_N;

        return $this;
    }

    /**
     * Method to set the value of field ime_kupca
     *
     * @param string $ime_kupca
     * @return $this
     */
    public function setImeKupca($ime_kupca)
    {
        $this->ime_kupca = $ime_kupca;

        return $this;
    }

    /**
     * Method to set the value of field adresa_dostava
     *
     * @param string $adresa_dostava
     * @return $this
     */
    public function setAdresaDostava($adresa_dostava)
    {
        $this->adresa_dostava = $adresa_dostava;

        return $this;
    }

    /**
     * Method to set the value of field ukupna_cijena
     *
     * @param double $ukupna_cijena
     * @return $this
     */
    public function setUkupnaCijena($ukupna_cijena)
    {
        $this->ukupna_cijena = $ukupna_cijena;

        return $this;
    }

    /**
     * Method to set the value of field datum
     *
     * @param string $datum
     * @return $this
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Returns the value of field sifra_N
     *
     * @return integer
     */
    public function getSifraN()
    {
        return $this->sifra_N;
    }

    /**
     * Returns the value of field ime_kupca
     *
     * @return string
     */
    public function getImeKupca()
    {
        return $this->ime_kupca;
    }

    /**
     * Returns the value of field adresa_dostava
     *
     * @return string
     */
    public function getAdresaDostava()
    {
        return $this->adresa_dostava;
    }

    /**
     * Returns the value of field ukupna_cijena
     *
     * @return double
     */
    public function getUkupnaCijena()
    {
        return $this->ukupna_cijena;
    }

    /**
     * Returns the value of field datum
     *
     * @return string
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'sifra_N' => 'sifra_N', 
            'ime_kupca' => 'ime_kupca', 
            'adresa_dostava' => 'adresa_dostava', 
            'ukupna_cijena' => 'ukupna_cijena', 
            'datum' => 'datum'
        );
    }

}

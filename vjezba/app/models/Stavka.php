<?php

class Stavka extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sifra_S;

    /**
     *
     * @var integer
     */
    public $sifra_N;

    /**
     *
     * @var integer
     */
    public $sifra_A;

    /**
     *
     * @var double
     */

    public $ukupna_cijena;
    public $nazivArtikla;

    public function getSource()
    {
        return "stavka_narudzba";
    }

    /**
     * Method to set the value of field sifra_S
     *
     * @param integer $sifra_S
     * @return $this
     */
    public function setSifraStavke($sifra_S)
    {
        $this->sifraStavke = $sifra_S;

        return $this;
    }

    /**
     * Method to set the value of field sifra_N
     *
     * @param integer $sifra_N
     * @return $this
     */
    public function setSifraNarudzbe($sifra_N)
    {
        $this->sifraNarudzbe = $sifra_N;

        return $this;
    }

    /**
     * Method to set the value of field sifra_A
     *
     * @param integer $sifra_A
     * @return $this
     */
    public function setSifraArtikla($sifra_A)
    {
        $this->sifraArtikla = $sifra_A;

        return $this;
    }

    public function setNazivArtikla($naziv_A)
    {
        $this->naziv_A = $naziv_A;

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
        $this->ukupnaCijena = $ukupna_cijena;

        return $this;
    }

    /**
     * Returns the value of field sifra_S
     *
     * @return integer
     */
    public function getSifraS()
    {
        return $this->sifra_S;
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
     * Returns the value of field sifra_A
     *
     * @return integer
     */
    public function getSifraA()
    {
        return $this->sifra_A;
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
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'sifra_S' => 'sifraStavke',
            'sifra_N' => 'sifraNarudzbe',
            'sifra_A' => 'sifraArtikla',
            'ukupna_cijena' => 'ukupnaCijena'
        );
    }

    public function findStavka($sifra)
    {
        $stavke = Stavka::find("sifraNarudzbe='$sifra'");
        return $stavke;
    }

}

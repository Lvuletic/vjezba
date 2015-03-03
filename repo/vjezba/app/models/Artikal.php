<?php

class Artikal extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $sifra;

    /**
     *
     * @var string
     */
    public $naziv;

    /**
     *
     * @var double
     */
    public $cijena;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'sifra' => 'sifra', 
            'naziv' => 'naziv', 
            'cijena' => 'cijena'
        );
    }

    public function findNaziv($sifra)
    {
        $artikal = Artikal::findFirstbysifra($sifra);
        return $artikal->naziv;
    }

}

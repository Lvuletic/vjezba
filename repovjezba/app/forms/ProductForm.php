<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 09/03/15
 * Time: 15:46
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;

class ProductForm extends Form
{
    public function initialize()
    {
        $text = new Text("name");
        $text->setLabel("Ime proizvoda");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Potrebno je ime'
        )));

        $this->add($text);

        $text2 = new Text("price");
        $text2->setLabel("Cijena");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Potrebna je cijena'
        )));
        $text2->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Cijena mora biti samo brojevi i decimale'
        )));

        $this->add($text2);

        $text3 = new Select("type", array("bijela tehnika", "hrana", "alkohol", "slatkisi", "mesnati proizvodi", "zitarice"));
        $text3->setLabel("Tip");
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Potreban je email'
        )));

        $this->add($text3);
    }

}
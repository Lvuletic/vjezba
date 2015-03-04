<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/03/15
 * Time: 10:30
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class KosaricaForm extends Form
{
    public function initialize()
    {
        $select = new Select("kosarica", array(), array("size" => 6, "name" => "kosarica[]", "multiple" => "multiple"));
        $select->setLabel("Vasa kosarica");

        $this->add($select);

        $text = new Text("customer");
        $text->setLabel("Vaše ime: ");

        $this->add($text);

        $text2 = new Text("address");
        $text2->setLabel("Adresa na koju želite dostavu: ");

        $this->add($text2);

    }


}
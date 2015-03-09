<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/03/15
 * Time: 09:32
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;

class PregledForm extends Form
{
    public function initialize()
    {
        $text = new Text("code");
        $text->setLabel("Unesite sifru narudzbe");

        $this->add($text);



    }


}
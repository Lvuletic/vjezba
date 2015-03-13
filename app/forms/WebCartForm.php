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

class WebCartForm extends Form
{
    public function initialize()
    {
        $select = new Select("webcart", array(), array("size" => 6, "name" => "webcart[]", "multiple" => "multiple"));
        $select->setLabel("Your webcart");

        $this->add($select);

    }

}
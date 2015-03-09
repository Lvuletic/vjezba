<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/03/15
 * Time: 10:36
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class ProductListForm extends Form
{
    public function initialize()
    {
        $select = new Select("product", Product::find(), array("size" => 6, "using" => array("name", "name")));
        $select->setLabel("Popis artikala");

        $this->add($select);

    }

}
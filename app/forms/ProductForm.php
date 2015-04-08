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
        $text->setLabel("Product name");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Product name is required'
        )));

        $this->add($text);

        $text2 = new Text("price");
        $text2->setLabel("Price");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $text2->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($text2);

        $select = new Select("type", ProductType::find(), array("size" => 1, "using" => array("id", "description")));
        $select->setLabel("Type");
        $select->addValidator(new PresenceOf(array(
            'message' => 'Product type is required'
        )));

        $this->add($select);
    }

}
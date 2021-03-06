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
        $text = new Text("name", array(
            "placeholder" => $this->translate->_("productname")
        ));
        $text->setLabel($this->translate->_("productname"));
        $text->addValidator(new PresenceOf(array(
            'message' => 'Product name is required'
        )));

        $this->add($text);

        $text2 = new Text("price", array(
            "placeholder" => $this->translate->_("productprice")
        ));
        $text2->setLabel($this->translate->_("productprice"));
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $text2->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($text2);

        $select = new Select("type", ProductType::find(), array("size" => 1, "useEmpty" => true, "using" => array("id", "description")));
        $select->setLabel($this->translate->_("producttype"));
        $select->addValidator(new PresenceOf(array(
            'message' => 'Product type is required'
        )));

        $this->add($select);
    }

}
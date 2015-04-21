<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 07/04/15
 * Time: 11:28
 */
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Select;
class ProductEditForm extends Form
{
    public function initialize()
    {
        $text = new Text("code", array(
            "readonly" => true
        ));
        $text->setLabel($this->translate->_("productcode"));
        $text->addValidator(new PresenceOf(array(
            'message' => 'Code is required'
        )));

        $this->add($text);

        $text2 = new Text("name", array(
            "placeholder" => $this->translate->_("productname")
        ));
        $text2->setLabel($this->translate->_("productname"));
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Name is required'
        )));

        $this->add($text2);

        $text3 = new Text("price", array(
            "placeholder" => $this->translate->_("productprice")
        ));
        $text3->setLabel($this->translate->_("productprice"));
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));

        $this->add($text3);

        $text4 = new Text("type", array(
            "placeholder" => $this->translate->_("producttype")
        ));
        $text4->setLabel($this->translate->_("producttype"));
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Type is required'
        )));

        $this->add($text4);

        $select = new Select("editType", ProductType::find(), array("size" => 1, "useEmpty" => true, "using" => array("id", "description")));
        $select->setLabel($this->translate->_("producttype"));
        $select->addValidator(new PresenceOf(array(
            'message' => 'Product type is required'
        )));

        $this->add($select);

    }

}
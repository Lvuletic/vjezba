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
        $text->setLabel("Kod");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Code is required'
        )));

        $this->add($text);

        $text2 = new Text("name");
        $text2->setLabel("Naziv");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Name is required'
        )));

        $this->add($text2);

        $text3 = new Text("price");
        $text3->setLabel("Cijena");
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));

        $this->add($text3);

        $text4 = new Text("type");
        $text4->setLabel("Tip");
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Type is required'
        )));

        $this->add($text4);

        $select = new Select("editType", ProductType::find(), array("size" => 1, "useEmpty" => true, "using" => array("id", "description")));
        $select->setLabel("Type");
        $select->addValidator(new PresenceOf(array(
            'message' => 'Product type is required'
        )));

        $this->add($select);

    }

}
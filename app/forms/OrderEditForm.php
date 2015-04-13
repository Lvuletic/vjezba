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
use Phalcon\Forms\Element\Date;
class OrderEditForm extends Form
{
    public function initialize()
    {
        $text = new Text("orderCode", array(
            "readonly" => true
        ));
        $text->setLabel("Kod");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Code is required'
        )));

        $this->add($text);

        $text2 = new Text("customerId");
        $text2->setLabel("Šifra kupca");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Customer Id is required'
        )));

        $this->add($text2);

        $text3 = new Text("address");
        $text3->setLabel("Adresa dostave");
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Address of delivery is required'
        )));

        $this->add($text3);

        $text4 = new Text("totalPrice");
        $text4->setLabel("Ukupna cijena");
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Total price is required'
        )));

        $this->add($text4);

        $date = new Date("date");
        $date->setLabel("Datum");
        $date->addValidator(new PresenceOf(array(
            'message' => 'Date is required'
        )));

        $this->add($date);


    }

}
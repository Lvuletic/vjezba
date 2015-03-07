<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 06/03/15
 * Time: 17:19
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;

class CustomerForm extends Form
{
    public function initialize()
    {
        $text = new Text("username");
        $text->setLabel("Ime");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Potrebno je ime'
        )));

        $this->add($text);

        $text2 = new Text("phone");
        $text2->setLabel("Telefon");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Potreban je telefon'
        )));

        $this->add($text2);

        $text3 = new Text("email");
        $text3->setLabel("E-mail");
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Potreban je email'
        )));
        $text3->addValidator(new Email(array(
            'message' => 'Krivi format emaila'
        )));

        $this->add($text3);

        $text4 = new Text("address");
        $text4->setLabel("Adresa");
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Potrebna je adresa'
        )));

        $this->add($text4);

        $text5 = new Password("password");
        $text5->setLabel("Lozinka");
        $text5->addValidator(new PresenceOf(array(
            'message' => 'Potrebna je šifra'
        )));
        $text5->addValidator(new StringLength(array(
            'message' => 'Šifra mora sadržavati između 6 i 16 znakova',
            'max' => 16,
            'min' => 6
        )));

        $this->add($text5);

    }

}
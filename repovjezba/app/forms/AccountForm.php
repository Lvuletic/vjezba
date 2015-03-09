<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 06/03/15
 * Time: 18:37
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;

class AccountForm extends Form
{
    public function initialize()
    {

        $text = new Text("phone");
        $text->setLabel("Telefon");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Potreban je telefon'
        )));

        $this->add($text);

        $text2 = new Text("email");
        $text2->setLabel("E-mail");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Potreban je email'
        )));
        $text2->addValidator(new Email(array(
            'message' => 'Krivi format emaila'
        )));

        $this->add($text2);

        $text3 = new Text("address");
        $text3->setLabel("Adresa");
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Potrebna je adresa'
        )));

        $this->add($text3);

        $text4 = new Password("oldPassword");
        $text4->setLabel("Upišite staru šifru");
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Potrebna je šifra'
        )));
        $text4->addValidator(new StringLength(array(
            'message' => 'Šifra mora sadržavati između 6 i 16 znakova',
            'max' => 16,
            'min' => 6
        )));

        $this->add($text4);

        $text5 = new Password("newPassword");
        $text5->setLabel("Upišite novu šifru");
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
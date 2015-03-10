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
        $text->setLabel("Name");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Username is required'
        )));

        $this->add($text);

        $text2 = new Text("phone");
        $text2->setLabel("Phone");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Phone number is required'
        )));

        $this->add($text2);

        $text3 = new Text("email");
        $text3->setLabel("E-mail");
        $text3->addValidator(new PresenceOf(array(
            'message' => 'Email is required'
        )));
        $text3->addValidator(new Email(array(
            'message' => 'Email must be in the proper format'
        )));

        $this->add($text3);

        $text4 = new Text("address");
        $text4->setLabel("Address");
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Address is required'
        )));

        $this->add($text4);

        $text5 = new Password("password");
        $text5->setLabel("Password");
        $text5->addValidator(new PresenceOf(array(
            'message' => 'Password is required'
        )));
        $text5->addValidator(new StringLength(array(
            'message' => 'Password must be between 6 and 16 characters in length',
            'max' => 16,
            'min' => 6
        )));

        $this->add($text5);

    }
}
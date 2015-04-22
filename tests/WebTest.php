<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 22/04/15
 * Time: 12:44
 */

require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.example.com/');
    }

    public function testTitle()
    {
        //$this->url('http://www.example.com/');
        //$this->assertEquals('Example WWW Page', $this->title());
        $this->open('http://www.example.com/');
        $this->assertTitle('Example WWW Page');

    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 18/03/15
 * Time: 17:22
 */

class Store extends Phalcon\Mvc\Collection
{
    public $location;
    public $size;
    public $address;

    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getLocation()
    {
        return $this->$location;
    }

    public function getSize()
    {
        return $this->$size;
    }

    public function getAddress()
    {
        return $this->$address;
    }

}
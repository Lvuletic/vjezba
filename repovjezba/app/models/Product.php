<?php

class Product extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $code;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var double
     */
    public $price;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code',
            'name' => 'name',
            'price' => 'price'
        );
    }

    public function findName($code)
    {
        $product = Product::findFirstbycode($code);
        return $product->name;
    }

}

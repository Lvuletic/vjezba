<?php

class Product extends \Phalcon\Mvc\Model implements CreateProduct
{
    /**
     *
     * @var integer
     */
    protected $code;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var double
     */
    protected $price;
    protected $type;

    /**
     * Method to set the value of field code
     *
     * @param integer $code
     * @return $this
     */

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $type;
    }

    /**
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Returns the value of field code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }

    public function initialize()
    {
        $this->hasMany("code", "OrderItem", "product_code", array(
            "foreignKey" => true
        ));
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'name' => 'name', 
            'price' => 'price',
            'type_id' => 'type'
        );
    }

    public function findObject($code)
    {
        $product = Product::findFirstbycode($code);
        return $product->name;
    }

    public function createNew($product, $name, $price)
    {
        //$product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        return $product;
    }

}

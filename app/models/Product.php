<?php

class Product extends \Phalcon\Mvc\Model
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
        $this->hasMany("code", "OrderItem", "productCode", array(
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

    public function createNew($product, $name, $price, $type)
    {
        $product->setName($name);
        $product->setPrice($price);
        $product->setType($type);
        return $product;
    }

    public function findProductType()
    {
        $phql = "SELECT product.*, producttype.description FROM product JOIN producttype ON product.type = producttype.id ORDER BY product.code";
        $query = $this->getModelsManager()->createQuery($phql);
        return $items = $query->execute();
    }

    public function findTypeDescription($id)
    {
        $type = ProductType::findFirst($id);

        $description = $type->getDescription();
        return $description;
    }

    public function findTypeId($description)
    {
        $types = ProductType::find();
        foreach ($types as $type)
        {
            if ($type->getDescription() == $description)
            {
                $id = $type->getId();
            }
        }
        return $id;
    }

}

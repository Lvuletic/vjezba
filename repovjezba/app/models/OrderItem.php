<?php

class OrderItem extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $order_code;

    /**
     *
     * @var integer
     */
    public $product_code;

    /**
     *
     * @var double
     */
    public $price;

    /**
     *
     * @var integer
     */
    public $quantity;

    /**
     *
     * @var double
     */
    public $total_price;
    public $productName;

    /**
     * Method to set the value of field order_code
     *
     * @param integer $order_code
     * @return $this
     */
    public function setOrderCode($order_code)
    {
        $this->orderCode = $order_code;

        return $this;
    }

    /**
     * Method to set the value of field product_code
     *
     * @param integer $product_code
     * @return $this
     */
    public function setProductCode($product_code)
    {
        $this->productCode = $product_code;

        return $this;
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
     * Method to set the value of field quantity
     *
     * @param integer $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Method to set the value of field total_price
     *
     * @param double $total_price
     * @return $this
     */
    public function setTotalPrice($total_price)
    {
        $this->totalPrice = $total_price;

        return $this;
    }

    /**
     * Returns the value of field order_code
     *
     * @return integer
     */
    public function getOrderCode()
    {
        return $this->order_code;
    }

    /**
     * Returns the value of field product_code
     *
     * @return integer
     */
    public function getProductCode()
    {
        return $this->product_code;
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

    /**
     * Returns the value of field quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the value of field total_price
     *
     * @return double
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'order_code' => 'orderCode',
            'product_code' => 'productCode',
            'price' => 'price',
            'quantity' => 'quantity',
            'total_price' => 'totalPrice'
        );
    }

    public function findItem($code)
    {
        $items = OrderItem::find("orderCode='$code'");
        return $items;
    }

}

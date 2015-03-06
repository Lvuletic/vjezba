<?php

class Orders extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $order_code;

    /**
     *
     * @var string
     */
    protected $customer;

    /**
     *
     * @var string
     */
    protected $address_delivery;

    /**
     *
     * @var double
     */
    protected $total_price;

    /**
     *
     * @var string
     */
    protected $date;

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
     * Method to set the value of field customer
     *
     * @param string $customer
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Method to set the value of field adress_delivery
     *
     * @param string $adress_delivery
     * @return $this
     */
    public function setAddressDelivery($address_delivery)
    {
        $this->address = $address_delivery;

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
     * Method to set the value of field date
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Returns the value of field order_code
     *
     * @return integer
     */
    public function getOrderCode()
    {
        return $this->orderCode;
    }

    /**
     * Returns the value of field customer
     *
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Returns the value of field adress_delivery
     *
     * @return string
     */
    public function getAddressDelivery()
    {
        return $this->address;
    }

    /**
     * Returns the value of field total_price
     *
     * @return double
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Returns the value of field date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'order_code' => 'orderCode',
            'customer' => 'customer',
            'address_delivery' => 'address',
            'total_price' => 'totalPrice',
            'date' => 'date'
        );
    }

    public function createNew($order, $address, $name)
    {
        $date = date("Y-m-d");
        $order->setAddressDelivery($address);
        $order->setCustomer($name);
        $order->setTotalPrice(0);
        $order->setDate($date);
        return $order;
    }

}

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
    protected $customer_id;

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
    public function setCustomerId($customer_id)
    {
        $this->customerId = $customer_id;

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
    public function getCustomerId()
    {
        return $this->customerId;
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


    public function initialize()
    {
        $this->belongsTo("customerId", "Customer", "id", array(
            "foreignKey" => true
        ));

        $this->hasMany("orderCode", "OrderItem", "orderCode", array(
            "foreignKey" => true
        ));

        $this->addBehavior(new Phalcon\Mvc\Model\Behavior\Timestampable(
            array(
                'beforeCreate' => array(
                    'field' => 'date',
                    'format' => 'Y-m-d'
                )
            )
        ));
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'order_code' => 'orderCode',
            'customer_id' => 'customerId',
            'address_delivery' => 'address',
            'total_price' => 'totalPrice',
            'date' => 'date'
        );
    }

    public function findOrderCustomer()
    {
        $phql = "SELECT Orders.*, Customer.username FROM Orders JOIN Customer ON Orders.customerId = Customer.id ORDER BY Orders.orderCode";
        $query = $this->getModelsManager()->createQuery($phql);
        return $items = $query->execute();
    }

    public function createNew($order, $address, $id)
    {
        $order->setAddressDelivery($address);
        $order->setCustomerId($id);
        $order->setTotalPrice(0);
        return $order;
    }

    public function findCustomerId($ordercode)
    {
        $order = Orders::findFirst($ordercode);
        return $order->getCustomerId();
    }

}

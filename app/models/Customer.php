<?php

use Phalcon\Mvc\Model\Validator\Email;
class Customer extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    protected $username;

    /**
     *
     * @var string
     */
    protected $phone;

    /**
     *
     * @var string
     */
    protected $email;

    protected $address;

    /**
     *
     * @var string
     */
    protected $password;


    /**
     * Method to set the value of field code
     *
     * @param integer $code
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returns the value of field code
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function initialize()
    {
        $this->hasMany("id", "Orders", "customer_id", array(
            "foreignKey" => true
        ));
    }

    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id',
            'username' => 'username',
            'phone' => 'phone', 
            'email' => 'email',
            'address' => 'address',
            'password' => 'password'
        );
    }

    public function findObject($id)
    {
        $customer = Customer::findFirst($id);
        return $customer;
    }

    public function findAddress($id)
    {
        $customer = Customer::findFirst($id);
        return $customer->address;
    }

    public function createNew($username, $phone, $email, $address, $password)
    {
        $customer = new Customer();
        $customer->setUsername($username);
        $customer->setPhone($phone);
        $customer->setEmail($email);
        $customer->setAddress($address);
        $customer->setPassword($password);
        return $customer;
    }

    public function updateUser($customer, $phone, $email, $address, $password)
    {
        $customer->setPhone($phone);
        $customer->setEmail($email);
        $customer->setAddress($address);
        $customer->setPassword($password);
        return $customer;
    }

    public function addNew()
    {
        $customer = new Customer();
        $customer->setUsername("dodo");
        $customer->setPhone("1234");
        $customer->setEmail("dodo@gmail.com");
        $customer->setAddress("rijeka");
        $customer->setPassword("abcd1234");
        return $customer->save();
    }

}

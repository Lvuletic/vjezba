<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class User extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

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

    public function getSource()
    {
        return "customer";
    }


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

    public function findUser($id)
    {
        $user = User::findFirst($id);
        return $user;
    }

    public function findAddress($id)
    {
        $user = User::findFirst($id);
        return $user->address;
    }

    public function findUsername($id)
    {
        $user = User::findFirst($id);
        return $user->username;
    }

    public function createNew($username, $phone, $email, $address, $password)
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPhone($phone);
        $user->setEmail($email);
        $user->setAddress($address);
        $user->setPassword($password);
        return $user;
    }

    public function updateUser($user, $phone, $email, $address, $password)
    {
        $user->setPhone($phone);
        $user->setEmail($email);
        $user->setAddress($address);
        $user->setPassword($password);
        return $user;
    }

}

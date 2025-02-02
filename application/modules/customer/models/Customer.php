<?php

//zf create model Customer
class Customer_Model_Customer
{
    /**
        * Customer ID
        *
        * @var int
        */
    protected $_id;
    /**
        * Customer first name
        *
        * @var string
        */
    protected $_firstName;
    /**
        * Customer last name
        *
        * @var string
        */
    protected $_lastName;
    /**
        * Customer email
        *
        * @var string
        */
    protected $_email;
    /**
        * Customer age
        *
        * @var int
        */
    protected $_age;
    /**
        * Is customer active
        *
        * @var bool
        */
    protected $_active;

    /**
        * Get customer ID
        *
        * @return int
        */
    public function getId()
    {
        return $this->_id;
    }

    /**
        * Set customer ID
        *
        * @param int $id
        * @return Application_Model_Customer
        */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
        * Get customer first name
        *
        * @return string
        */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
        * Set customer first name
        *
        * @param string $firstName
        * @return Application_Model_Customer
        */
    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
        return $this;
    }

    /**
        * Get customer last name
        *
        * @return string
        */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
        * Set customer last name
        *
        * @param string $lastName
        * @return Application_Model_Customer
        */
    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
        return $this;
    }

    /**
        * Get customer email
        *
        * @return string
        */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
        * Set customer email
        *
        * @param string $email
        * @return Application_Model_Customer
        */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }

    /**
        * Get customer age
        *
        * @return int
        */
    public function getAge()
    {
        return $this->_age;
    }

    /**
        * Set customer age
        *
        * @param int $age
        * @return Application_Model_Customer
        */
    public function setAge($age)
    {
        $this->_age = $age;
        return $this;
    }

    /**
        * Get customer active status
        *
        * @return bool
        */
    public function getActive()
    {
        return $this->_active;
    }

    /**
        * Set customer active status
        *
        * @param bool $active
        * @return Application_Model_Customer
        */
    public function setActive($active)
    {
        $this->_active = $active;
        return $this;
    }
}
<?php

//zf create model CustomerMapper
class Customer_Model_CustomerMapper
{
    /**
        * Customer table
        *
        * @var Customer_Model_DbTable_Customer
        */
    protected $_dbTable;

    /**
        * Get customer table
        *
        * @return Customer_Model_DbTable_Customer
        */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Customer_Model_DbTable_Customer');
        }

        return $this->_dbTable;
    }

    /**
        * Set customer table
        *
        * @param string, Customer_Model_DbTable_Customer $dbTable
        * @return Customer_Model_CustomerMapper
        */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }

        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }

        $this->_dbTable = $dbTable;

        return $this;
    }

    public function save(Customer_Model_Customer $customer)
    {
        $data = array(
            'id' => $customer->getId(),
            'first_name' => $customer->getFirstName(),
            'last_name' => $customer->getLastName(),
            'email' => $customer->getEmail(),
            'age' => $customer->getAge(),
            'active' => $customer->getActive(),
        );
        
        unset($data['id']);
        
        if (null === ($id = $customer->getId())) {
            // var_dump($data, $id);
            // die('insert');
            
            // unset($data['id']);
             $id = $this->getDbTable()->insert($data);
             $customer->setId($id);
        } else {
            //var_dump($data, $id);
          //  die('update');
             //var_dump($id, $data,$this->getDbTable()->update($data, array('id = ?' => $id)));
            
            // die('update');
            
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function delete($id)
    {
        $row = $this->getDbTable()->find($id)->current();
        if ($row) {
            $row->delete();
            return true;
        } else {
            throw new Zend_Exception("Delete function failed; could not find row!");
        }
    }

    /**
        * Find customer by ID
        *
        * @param int $id
        * @return Customer_Model_Customer
        */
    public function find($id)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }

        $row = $result->current();

        $entry = new Customer_Model_Customer();
        $entry->setId($row->id)
                ->setFirstName($row->first_name)
                ->setLastName($row->last_name)
                ->setEmail($row->email)
                ->setAge($row->age)
                ->setActive($row->active);

        return $entry;
    }

    /**
        * Fetch all customers
        *
        * @return array
        */
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Customer_Model_Customer();
            $entry->setId($row->id)
                    ->setFirstName($row->first_name)
                    ->setLastName($row->last_name)
                    ->setEmail($row->email)
                    ->setAge($row->age)
                    ->setActive($row->active);
            $entries[] = $entry;
        }

        return $entries;
    }

    /**
     * Selec
     *
     * @return any
     */

     public function select(){
        return $this->getDbTable()->select();
     }

}
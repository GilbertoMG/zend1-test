<?php
class Blog_Model_Blog
{
    protected $_table = 'blog';
 
    public function info()
    {
        return 'Blog Index Controller info';
    }

    public function findAll()
    {
        return $this->table()->fetchAll();
    }

    protected function table()
    {
        return new Zend_Db_Table($this->_table);
    }
}
<?php
class Blog_Model_Blog extends Application_Model_Base
{
    public function init()
    {
        $this->_name = 'blog';
        $this->_primary = 'id';
        parent::init();
    }
 
    public function findAll()
    {
        return $this->fetchAll();
    }
    
    // update
    public function update($id, $data)
    {
        return $this->update($data, array('id = ?' => $id));
    }
   
    // delete
    public function delete($id)
    {
        return $this->delete(array('id = ?' => $id));
    }

    
}
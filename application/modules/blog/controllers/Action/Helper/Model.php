<?php
class Blog_Controller_Action_Helper_Model extends Zend_Controller_Action_Helper_Abstract
{
    public function direct($modelName)
    {
        $modelClass = 'Blog_Model_' . $modelName;
        return new $modelClass();
    }
}

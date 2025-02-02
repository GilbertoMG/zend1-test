<?php
class Application_Model_Base extends Zend_Db_Table
{
    protected $_name = '';
    protected $_primary = '';

    public function __construct() {
        parent::__construct();
    }
}
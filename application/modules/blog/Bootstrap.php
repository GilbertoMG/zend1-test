<?php
class Blog_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initHelpers()
    {
        Zend_Controller_Action_HelperBroker::addPath(
            APPLICATION_PATH . '/modules/blog/controllers/Action/Helper',
            'Blog_Controller_Action_Helper_'
        );
    }
}
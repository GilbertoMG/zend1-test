<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
    }
    
    public function indexAction()
    {
        $this->view->teste = " teste da view";
    }

    public function buscarAction()
    {
    }
}
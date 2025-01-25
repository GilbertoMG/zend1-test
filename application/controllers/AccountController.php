<?php
class AccountController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->teste = " teste da view";
    }

    public function buscarAction()
    {
    }
}
<?php

class TesteController extends Zend_Controller_Action
{
    public function init()
    {
    }
    
    public function indexAction()
    {
        // Instanciar a model Usuario

        $usuario = new Application_Model_Usuario();
        $data = $usuario->sql();

        var_dump($data->toArray());

    }
}
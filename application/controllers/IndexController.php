<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
    }
    
    public function indexAction()
    {
        $form = new Zend_Form();

        $form->setAttrib('id', 'formIndex')
             ->setAction('/index/buscar')
             ->setMethod('post')
             ->addElement('text', 'nome', array(
                 'label' => 'Nome',
                 'required' => true,
                 'filters' => array('StringTrim'),
                 'validators' => array('NotEmpty')
             ))
             ->addElement('submit', 'buscar', array(
                 'label' => 'Buscar'
             ));

        $this->view->form = $form;

        $this->view->teste = " teste da view";
    }

    public function buscarAction()
    {
    }
}
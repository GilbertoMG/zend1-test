<?php

class PostController extends Zend_Controller_Action
{
    public function init()
    {
    }
    
    public function indexAction()
    {
        $form = new Application_Form_Post();

        
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
               $data = $form->getValues();
            //    $model = new Application_Model_Post();
            //    $model->inserir($data);
            //    $this->_redirect('/post');
            }
        }   
        $this->view->form = $form;
    }
}
<?php

class PagerController extends Zend_Controller_Action
{
    public function init()
    {
        //$this->_helper->layout->disableLayout(); // Desabilita o layout
        //$this->_helper->viewRenderer->setNoRender(); // Desabilita a renderização
    }
    
    public function indexAction()
    {
        $dados = range(1, 200); // Array de 1 a 50
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($dados));
        $paginator->setCurrentPageNumber($this->getParam('page')); // Define a página atual como 5
        $paginator->setPageRange(10);
        $this->view->paginator = $paginator; // Passa o paginator para a view

    }
}
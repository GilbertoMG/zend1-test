<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
    }
    
    public function indexAction()
    {

        $indexForm = new Application_Form_IndexForm();

        // $form = new Zend_Form();

        // $form->setAttrib('id', 'formIndex')
        //      ->setAction('/index/buscar')
        //      ->setMethod('post')
        //      ->addElement('text', 'nome', array(
        //          'label' => 'Nome',
        //          'required' => true,
        //          'filters' => array('StringTrim'),
        //          'validators' => array('NotEmpty')
        //      ))
        //      ->addElement('submit', 'buscar', array(
        //          'label' => 'Buscar'
        //      ));

        $dbTable = new Application_Model_DBTable_Index();
        //var_dump($dbTable->info());
        // Retorna as colunas -- $dbTable->info(Zend_Db_Table_Abstract::COLS)
        
        //var_dump($dbTable->info(Zend_Db_Table_Abstract::COLS));
        // Retorna os nomes das colunas -- $dbTable->info(Zend_Db_Table_Abstract::COLS)
        
        //Results
        $tableName = $dbTable->info(Zend_Db_Table_Abstract::NAME);
        $results = $dbTable->fetchAll(array(
            'role = ?' => 1,
        ))->toArray();
        
        //DEBUG
        foreach ($results as $key => $value) {
            echo $key . ' - ' . $value['username'] . ' - ' . $value['role'] . '<br />';
        }
 
$this->view->results = $results;
     //   var_dump($this->view->results);
        $this->view->form = $indexForm;
        $this->view->tableName = $tableName;

        $this->view->teste = " teste da view";
    }

    public function buscarAction()
    {
    }
}
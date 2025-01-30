<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
    }
    
    public function indexAction()
    {
        // Instanciar a model Usuario

        $usuario = new Application_Model_Usuario();

        // teste de inserção

        // $usuario->inserir([
        //     'lname' => 'Santos1',
        //     'fname' => 'Jose1',
        //     'username' => 'jose.1santos',
        //     'email' => 'jose@santos1.com',
        //     'password' => '123456',
        //     'role' =>    1,
        //     'bio' => 'teste1',
        //     'image' => 'jose.jpg',
        //     'outra'=> 3
        // ]);

        // teste de atualização

        //  $update = $usuario->update([
        //      'lname' => 'Santos2 editado',
        //      'fname' => 'Jose2',
        //      'username' => 'jose.2santos',
        //      'email' => 'jose@santos2.com',
        //      'password' => '123456',
        //      'role' =>    1,
        //      'bio' => 'teste2',
        //      'image' => 'jose1.jpg',
        //      'outra'=> 3
        //  ], 21);



        // var_dump($update);   

        // teste de exclusão

        // $usuario->delete(21);

        // Chamar o método listar

       // $data = $usuario->listar(); 

      //  var_dump($data);

        // Instanciar o formulário

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
        // $data = [
        //  'fname' => 'John',
        //   'lname' => 'Doe',
        //    'username' => 'johndoe2',
        //     'email' => 'johndoe@example2.com',
        //      'password' => '123456',
        //       'image' => 'johndoe.jpg',
        //        'bio' => 'John Doe is a software developer.',
        //         'role' => 1,
        //          'date'=> date('Y-m-d H:i:s'),                 
        // ];
        //  // insert
        // var_dump($dbTable->insert($data));
        
        // update
        // $data = [
        //  'fname' => 'John',
        //   'lname' => 'Doe',
        //    'username' => 'johndoe2',
        //     'email' => 'johndoe@example2.com',
        //      'password' => '123456',
        //       'image' => 'johndoe.jpg',
        //        'bio' => 'John Doe is a software developer. 222',
        //         'role' => 1,
        //          'date'=> date('Y-m-d H:i:s'),                 
        // ];
        // $where = array('id = ?' => 13);
        // var_dump($dbTable->update($data, $where));
        
        // // delete
        $where = array('id = ?' => 10);
        var_dump($dbTable->delete($where));
        // $results = $dbTable->fetchAll(array(
        //     'role = ?' => 1,
        // ))->toArray();
        
        // //DEBUG
        // foreach ($results as $key => $value) {
        //     echo $key . ' - ' . $value['username'] . ' - ' . $value['role'] . '<br />';
        // }

        // find
        //$result = $dbTable->find(5);
        //var_dump($result['username']);
        //echo $result[0]['username'];
        //$this->view->results = $results;
        //   var_dump($this->view->results);
        // $this->view->form = $indexForm;
        // $this->view->tableName = $tableName;
        // $this->view->teste = " teste da view";
    }

    public function buscarAction()
    {
    }
}
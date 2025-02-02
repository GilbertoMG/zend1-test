<?php

//zf create controller Customer
class Customer_CustomerController extends Zend_Controller_Action
{

    public function init()
    {
        
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_redirect('customer/customer/list');
    }

    //zf create action list Customer
    public function listAction()
    {
        //die('maldito _forward');
        $customerMapper = new Customer_Model_CustomerMapper();
       // $this->view->entries = $customerMapper->fetchAll();
       $select = $customerMapper->select();
       $paginator = Zend_Paginator::factory($select);
       $paginator->setItemCountPerPage(2);
       $paginator->setCurrentPageNumber($this->_getParam('page', 1));
       $this->view->paginator = $paginator;


    }

    //zf create action view Customer
    public function viewAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $customerMapper = new Customer_Model_CustomerMapper();
        $this->view->entry = $customerMapper->find($id);
    }

    //zf create action create Customer
    public function createAction()
    {
        $form = new Customer_Form_CustomerForm();
        $form->setAction('create'); //$this->view->baseUrl('/customer/customer/create')
        $form->setMethod('post');

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {

                $customerMapper = new Customer_Model_CustomerMapper();

                $customer = new Customer_Model_Customer();
                $customer->setActive($form->getValue('active'))
                        ->setAge($form->getValue('age'))
                        ->setEmail($form->getValue('email'))
                        ->setFirstName($form->getValue('firstName'))
                        ->setLastName($form->getValue('lastName'));

                $customerMapper->save($customer);

                if ($customer->getId()) {
                    $this->_forward('list');
                }
            }
        }

        $this->view->form = $form;
    }

    //zf create action edit Customer
    public function editAction()
    {
        $form = new Customer_Form_CustomerForm();
        $form->setAction('edit');
        $form->setMethod('post');

        $customerMapper = new Customer_Model_CustomerMapper();

        if ($this->getRequest()->isPost()) {
          
            if ($form->isValid($_POST)) {
                $customer = new Customer_Model_Customer();

                $customer->setId($form->getValue('id'))
                        ->setActive($form->getValue('active'))
                        ->setAge($form->getValue('age'))
                        ->setEmail($form->getValue('email'))
                        ->setFirstName($form->getValue('firstName'))
                        ->setLastName($form->getValue('lastName'));
//                         var_dump($customer);
// die();
                $customerMapper->save($customer);

                $this->_forward('list');
            }
        } else {
            $id = $this->getRequest()->getParam('id');
            $customer = $customerMapper->find($id);

            $values = array(
                'id' => $customer->getId(),
                'firstName' => $customer->getFirstName(),
                'lastName' => $customer->getLastName(),
                'email' => $customer->getEmail(),
                'age' => $customer->getAge(),
                'active' => $customer->getActive(),
            );

            $form->populate($values);
        }

        $this->view->form = $form;
    }

    //zf create action delete Customer
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        $customerMapper = new Customer_Model_CustomerMapper();
        $customerMapper->delete($id);
        $this->_redirect('customer/customer/list');
    }

}
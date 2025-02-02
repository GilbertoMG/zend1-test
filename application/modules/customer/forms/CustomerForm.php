<?php

//zf create form customerForm
class Customer_Form_CustomerForm extends Zend_Form
{

    public function init()
    {
        $id = $this->createElement('hidden', 'id');
        $this->addElement($id);

        $firstName = $this->createElement('text', 'firstName');
        $firstName->setLabel('First name:');
        $firstName->setRequired();
        $firstName->setAttrib('size', 30);
        $this->addElement($firstName);

        $lastName = $this->createElement('text', 'lastName');
        $lastName->setLabel('Last name:');
        $lastName->setRequired();
        $lastName->setAttrib('size', 30);
        $this->addElement($lastName);

        $email = $this->createElement('text', 'email');
        $email->setLabel('Email:');
        $email->setRequired();
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->addFilters(array(
            new Zend_Filter_StringTrim(),
            new Zend_Filter_StringToLower(),
        ));
        $email->setAttrib('size', 30);
        $this->addElement($email);

        $age = $this->createElement('text', 'age');
        $age->setLabel('Age:');
        $age->setRequired();
        $age->addValidator(new Zend_Validate_Int());
        $age->setAttrib('size', 30);
        $this->addElement($age);

        $active = $this->createElement('checkbox', 'active');
        $active->setLabel('Active:');
        $this->addElement($active);

        $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }

}
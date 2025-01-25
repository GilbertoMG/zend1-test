<?php
class Application_Form_IndexForm extends Zend_Form
{
    /**
     * @return void
     * @var Zend_Form_Element_Text
     */
    private $id;
     /**
     * @return void
     * @var Zend_Form_Element_Submit
     */
    private $submit;
    
    public function init()
    {
        
        $this->setAction('/index/buscar');
        $this->setMethod('post');
        $this->setName('buscar');
        $this->setAttrib('id', 'login');

        $this->id = new Zend_Form_Element_Text('id');
        $this->id->setOptions(array(
            'label' => 'Nome',
            'required' => true,
            'filters' => array('StringTrim'),
            'validators' => array('NotEmpty')
        ));
        
        $this->submit = new Zend_Form_Element_Submit('submit');
        $this->submit->setOptions(array(
            'label' => 'Enviar',
            'ignore' => true
        ));
        
        $this->addElements(array(
            $this->id,
            $this->submit
        ));
        
    }
}
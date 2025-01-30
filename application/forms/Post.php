<?php

class Application_Form_Post extends Zend_Form {
    
    public function init() {
        /**
         * forms elements         
         * */ 
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Título')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setDecorators(array(
                    'ViewHelper',                    
                    'Errors',
                    'Description',
                    array('HtmlTag',array('tag' => 'div')),
                    array('Label',array('tag' => 'p')),
                ));
        
        $texto = new Zend_Form_Element_Textarea('texto');
        $texto->setLabel('Texto')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim');        
        
        
        /**
         * submit button
         * */
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Salvar')
                ->setIgnore(false);
        
        $this->addElements(array($titulo, $texto, $submit));
    }

}
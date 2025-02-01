<?php
class blog_Form_Blog extends Zend_Form {

    public function init()
    {
        $this->addElement('text', 'title', array(
            'label' => 'Title',
            'required' => true,
        ));

        $this->addElement('textarea', 'content', array(
            'label' => 'Content',
            'required' => true,
        ));

        $this->addElement('submit', 'submit', array(
            'label' => 'Salvar',
        ));
    }
}

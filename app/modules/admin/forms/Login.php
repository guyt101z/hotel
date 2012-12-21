<?php

class Admin_Form_Login extends Zend_Form
{
    public function init()
    {
        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('title', 'Email')->setRequired(true);

        $pwd = new Zend_Form_Element_Password('pwd');
        $pwd->setAttrib('title', 'Password')->setRequired(true);

        $hash = new Zend_Form_Element_Hash('hash');

        $this->addElements(array($email, $pwd, $hash));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }
}

?>
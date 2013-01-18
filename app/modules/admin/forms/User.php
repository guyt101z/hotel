<?php 

class Admin_Form_User extends Zend_Form 
{
    
        public function init() 
        {
                $first_name = new Zend_Form_Element_Text('first_name');
                $first_name->setRequired(true);
                
                $last_name = new Zend_Form_Element_Text('last_name');
                
                $company_name = new Zend_Form_Element_Text('company_name');
                
                $email = new Zend_Form_Element_Text('email');
                $email->setRequired(true);
                
                $pwd = new Zend_Form_Element_Text('pwd');
                $pwd->setRequired(true)
                    ->addValidator('stringLength', false, array(5, 32))
                    ->addErrorMessage('Please use between 5 and 32 characters');
                
                $power = new Zend_Form_Element_Select('power');
                for ($i=1; $i<6; $i++) {
                    $power->addMultiOption($i, $i);
                }
                $power->setRequired(true);
                
                $user_type = new Zend_Form_Element_Text('user_type');
                
                $status = new Zend_Form_Element_Select('status');
                $status->setRequired(true);
                $status->addMultiOption('on', 'On');
                $status->addMultiOption('off', 'Off');
                
                $this->addElements(array($first_name, $last_name, $company_name, $email, $pwd, $power, $user_type, $status));
        
                foreach($this->getElements() as $element) {
                        $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
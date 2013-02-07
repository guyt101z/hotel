<?php 

class Admin_Form_HotelUser extends Zend_Form 
{	

    public function init() 
    {
        $huid = new Zend_Form_Element_Hidden('huid');
        
        $hid = new Zend_Form_Element_Text('hid');
        
        $uid = new Zend_Form_Element_Text('uid');
        
        $this->addElements(array($huid, $hid, $uid));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
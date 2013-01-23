<?php 

class Admin_Form_Hotel extends Zend_Form 
{	

    public function init() 
    {
        $hid = new Zend_Form_Element_Hidden('hid');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setRequired(true);
        
        $lat = new Zend_Form_Element_Text('lat');
        
        $lgt = new Zend_Form_Element_Text('lgt');
        
        $this->addElements(array($hid, $name, $lat, $lgt));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
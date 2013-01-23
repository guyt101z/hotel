<?php 

class Admin_Form_TranslateHotel extends Zend_Form 
{	

    public function init() 
    {
        $tr_hid = new Zend_Form_Element_Hidden('tr_hid');
        
        $name = new Zend_Form_Element_Select('name');
        $name->setRequired(true);
        
        $lat = new Zend_Form_Element_Text('lat');
        
        $lgt = new Zend_Form_Element_Text('lgt');
        
        $this->addElements(array($tr_hid, $name, $lat, $lgt));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
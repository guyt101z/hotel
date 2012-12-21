<?php 

class Admin_Form_World extends Zend_Form 
{	
    public function init() 
    {
        $wid = new Zend_Form_Element_Hidden('wid');

        $parent_id = new Zend_Form_Element_Text('parent_id');
        $parent_id->setRequired(true);

        $lat = new Zend_Form_Element_Text('lat');
        
        $lgt = new Zend_Form_Element_Text('lgt');
        
        $title = new Zend_Form_Element_Text('title');
        
        $this->addElements(array($wid, $parent_id, $lat, $lgt, $title));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
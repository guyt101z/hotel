<?php 

class Admin_Form_Brand extends Zend_Form 
{	

    public function init() 
    {
        $lid = new Zend_Form_Element_Hidden('bid');
        
        $title = new Zend_Form_Element_Text('title');
        $title->setRequired(true);
        
        $status = new Zend_Form_Element_Select('status');
        $status->setRequired(true);
        $status->addMultiOptions(array(
            'on' => 'On',
            'off' => 'Off'
        ));
        
        $this->addElements(array($lid, $title, $status));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
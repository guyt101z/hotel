<?php 

class Admin_Form_Language extends Zend_Form 
{	
    public function init() 
    {
        $lid = new Zend_Form_Element_Hidden('lid');

        $locale = new Zend_Form_Element_Text('locale');
        $locale->setRequired(true);

        $title = new Zend_Form_Element_Text('title');
        $title->setRequired(true);
        
        $this->addElements(array($lid, $locale, $title));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
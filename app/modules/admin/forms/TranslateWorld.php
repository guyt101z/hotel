<?php 

class Admin_Form_TranslateWorld extends Zend_Form 
{	
    public function init() 
    {
        $tr_wid = new Zend_Form_Element_Hidden('tr_wid');
        
        $wid = new Zend_Form_Element_Text('wid');
        $wid->setRequired(true);
        
        $locale = new Zend_Form_Element_Text('locale');
        $locale->setRequired(true);

        $title = new Zend_Form_Element_Text('title');
        
        $this->addElements(array($tr_wid, $wid, $locale, $title));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
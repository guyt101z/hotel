<?php 

class Admin_Form_TranslateBrandStore extends Zend_Form 
{	

    public function init() 
    {
        $tr_bsid = new Zend_Form_Element_Hidden('tr_bsid');
        
        $bsid = new Zend_Form_Element_Text('bsid');
        
        $locale = new Zend_Form_Element_Text('locale');
        
        $title = new Zend_Form_Element_Text('title');
        
        $content = new Zend_Form_Element_Select('content');
        
        $this->addElements(array($tr_bsid, $bsid, $locale, $title, $content));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
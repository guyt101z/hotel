<?php 

class Admin_Form_Taxonomy extends Zend_Form 
{	
    public function init() 
    {
        $tr_tid = new Zend_Form_Element_Hidden('tr_tid');
        
        $tid = new Zend_Form_Element_Text('tid');
        
        $parent_id = new Zend_Form_Element_Text('parent_id');

        $pos = new Zend_Form_Element_Text('pos');
        
        $section = new Zend_Form_Element_Select('section');
        $section->setRequired(true);
        $section->addMultiOptions(array(
            'hotel' => 'Hotel',
            'city' => 'City',
            'ad' => 'Ad'
        ));
        
        $locale = new Zend_Form_Element_Select('locale');
        $locale->setRequired(true);
        $lang_table = new Admin_Model_DbTable_Languages();
        $languages = $lang_table->getLanguages();
        if ($languages) {
            foreach ($languages as $l) {
                $locale->addMultiOption($l['locale'], $l['locale']);
            }
        }

        $content = new Zend_Form_Element_Text('content');
        
        $this->addElements(array($tr_tid, $tid, $parent_id, $pos, $section, $locale, $content));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
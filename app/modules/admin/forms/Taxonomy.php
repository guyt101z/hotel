<?php 

class Admin_Form_Taxonomy extends Zend_Form 
{	
    public function init() 
    {
        $tid = new Zend_Form_Element_Text('tid');
        
        $parent_id = new Zend_Form_Element_Select('parent_id');
        $parent_id->addMultiOption(0, '&nbsp;');
        $taxo_table = new Admin_Model_DbTable_Taxonomies();
        $parents = $taxo_table->getTaxonomyNames();
        if ($parents) {
            foreach ($parents as $p) {
                $parent_id->addMultiOption($p['tid'], $p['name']);
            }
        }
        
        $name = new Zend_Form_Element_Text('name');
        $name->setRequired(true);
        
        $pos = new Zend_Form_Element_Text('pos');
        
        $section = new Zend_Form_Element_Select('section');
        $section->setRequired(true);
        $section->addMultiOptions(array(
            'hotel' => 'Hotel',
            'city' => 'City',
            'ad' => 'Ad'
        ));
        
        /*
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
         */
        
        $this->addElements(array($tid, $parent_id, $name, $pos, $section));
        
        foreach($this->getElements() as $element) {
            $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
        }
    }

}

?>
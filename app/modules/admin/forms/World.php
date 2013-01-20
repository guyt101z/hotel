<?php 

class Admin_Form_World extends Zend_Form 
{
    
        public function init() 
        {
                $wid = new Zend_Form_Element_Hidden('wid');

                $parent_id = new Zend_Form_Element_Select('parent_id');
                $parent_id->addMultiOption(0, '&nbsp;');
                $parent_id->setRequired(true);
                $table_world = new Admin_Model_DbTable_World();
                $parents = $table_world->getParents();
                if ($parents){
                        foreach ($parents as $p) {
                                $parent_id->addMultiOption($p['wid'], $p['title']);
                        }
                }
                
                $locale = new Zend_Form_Element_Select('locale');
               // $locale = new Zend_Form_Element_Multiselect('locale');
               // $locale->setAttrib('class', 'chzn-select')->setRequired(true);
                $locale->setRequired(true);
                $table_lang = new Admin_Model_DbTable_Languages();
                $languages = $table_lang->getLanguages();
                if ($languages) {
                        foreach ($languages as $l) {
                                $locale->addMultiOption($l['locale'], $l['locale']);
                        }
                }
               
                $lat = new Zend_Form_Element_Text('lat');
        
                $lgt = new Zend_Form_Element_Text('lgt');
        
                $title = new Zend_Form_Element_Text('title');
                $title->setRequired(true);
                
                $this->addElements(array($wid, $parent_id, $locale, $lat, $lgt, $title));
        
                foreach($this->getElements() as $element) {
                        $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
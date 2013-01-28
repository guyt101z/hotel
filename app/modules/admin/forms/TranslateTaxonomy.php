<?php 

class Admin_Form_TranslateTaxonomy extends Zend_Form 
{	

        public function init() 
        {
                $tr_hid = new Zend_Form_Element_Hidden('tr_hid');

                $tid = new Zend_Form_Element_Select('tid');
                $taxo_table = new Admin_Model_DbTable_Taxonomies();
                $taxonomies = $taxo_table->getTaxonomyNames();
                if ($taxonomies) {
                    foreach ($taxonomies as $t) {
                        $tid->addMultiOption($t['tid'], $t['name']);
                    } 
                }

                $locale = new Zend_Form_Element_Select('locale');
                $lang_table = new Admin_Model_DbTable_Languages();
                $languages = $lang_table->getLanguages();
                if ($languages) {
                        foreach ($languages as $l) {
                                $locale->addMultiOption($l['locale'], $l['locale']);
                        }
                }
                
                $content = new Zend_Form_Element_Text('content');

                $this->addElements(array($tr_hid, $tid, $locale, $content));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
<?php 

class Admin_Form_TranslateBrandStore extends Zend_Form 
{	

        public function init() 
        {
                $tr_bsid = new Zend_Form_Element_Hidden('tr_bsid');

                $bsid = new Zend_Form_Element_Select('bsid');
                $brand_store_table = new Admin_Model_DbTable_BrandStores();
                $brand_stores = $brand_store_table->getBrandStoreNames();
                if ($brand_stores) {
                    foreach($brand_stores as $b) {
                        $bsid->addMultiOption($b['bsid'], $b['name']);
                    }
                }

                $locale = new Zend_Form_Element_Select('locale');
                $locale_table = new Admin_Model_DbTable_Languages();
                $languages = $locale_table->getLanguages();
                if ($languages) {
                    foreach($languages as $l) {
                        $locale->addMultiOption($l['locale'], $l['locale']);
                    }
                }

                $title = new Zend_Form_Element_Text('title');

                $content = new Zend_Form_Element_Textarea('content');

                $this->addElements(array($tr_bsid, $bsid, $locale, $title, $content));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
<?php 

class Admin_Form_BrandStore extends Zend_Form 
{	

        public function init() 
        {

                $bsid = new Zend_Form_Element_Hidden('bsid');

                $bid = new Zend_Form_Element_Select('bid');
                $brands_table = new Admin_Model_DbTable_Brands();
                $brands = $brands_table->getBrandsNotInBrandStores();
                if ($brands) {
                    foreach ($brands as $b) {
                        $bid->addMultiOption($b['bid'], $b['title']);
                    }
                }

                $lat = new Zend_Form_Element_Text('lat');

                $lgt = new Zend_Form_Element_Text('lgt');

                $wid = new Zend_Form_Element_Select('wid');
                $world_table = new Admin_Model_DbTable_World();
                $world = $world_table->getWorld();
                if ($world) {
                    foreach ($world as $w) {
                        $wid->addMultiOption($w['wid'], $w['title']);
                    }
                }

                $status = new Zend_Form_Element_Select('status');
                $status->setRequired(true);
                $status->addMultiOptions(array(
                    'on' => 'On',
                    'off' => 'Off'
                ));

                $locale = new Zend_Form_Element_Select('locale');
                $lang_table = new Admin_Model_DbTable_Languages();
                $languages = $lang_table->getLanguages();
                if ($languages) {
                    foreach ($languages as $l) {
                        $locale->addMultiOption($l['locale'], $l['locale']);
                    }
                }

                $title = new Zend_Form_Element_Textarea('title');
                $title->setRequired(true);

                $content = new Zend_Form_Element_Textarea('content');

                $this->addElements(array($bsid, $bid, $lat, $lgt, $wid, $status, $locale, $title, $content));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
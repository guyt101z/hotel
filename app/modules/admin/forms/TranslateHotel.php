<?php 

class Admin_Form_TranslateHotel extends Zend_Form 
{	

        public function init() 
        {
                $tr_hid = new Zend_Form_Element_Hidden('tr_hid');

                $hid = new Zend_Form_Element_Hidden('hid');

                $locale = new Zend_Form_Element_Select('locale');
                $locale_table = new Admin_Model_DbTable_Languages();
                $languages = $locale_table->getLanguages();
                if ($languages) {
                    foreach($languages as $l) {
                        $locale->addMultiOption($l['locale'], $l['locale']);
                    }
                }

                $title = new Zend_Form_Element_Text('title');
                $title->setAttribs(array('class' => 'full'));

                $content = new Zend_Form_Element_Textarea('content');
                $content->setAttribs(array('id' => 'editor'));
                
                $address = new Zend_Form_Element_Textarea('address');
                $address->setAttribs(array( 'id' => 'editor2'));

                $this->addElements(array($tr_hid, $hid, $locale, $title, $content, $address));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
    }

}

?>
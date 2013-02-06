<?php 

class Admin_Form_TranslateArticle extends Zend_Form 
{	

        public function init() 
        {
                $tr_aid = new Zend_Form_Element_Hidden('tr_aid');

                $aid = new Zend_Form_Element_Hidden('aid');

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
                $content->setAttribs(array( 'id' => 'editor'));

                $this->addElements(array($tr_aid, $aid, $locale, $title, $content));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
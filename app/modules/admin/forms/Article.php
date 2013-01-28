<?php 

class Admin_Form_Article extends Zend_Form 
{	

        public function init() 
        {
                $aid = new Zend_Form_Element_Hidden('aid');

                $article_type = new Zend_Form_Element_Text('article_type');

                $title = new Zend_Form_Element_Text('title');
                $title->setAttribs(array('class'=>'full'));

                $lat = new Zend_Form_Element_Text('lat');

                $lgt = new Zend_Form_Element_Text('lgt');

                $stime = new Zend_Form_Element_Text('stime');
                $stime->setAttribs(array('id' => 'datetimepicker'))
                        ->setRequired(true);

                $etime = new Zend_Form_Element_Text('etime');
                $etime->setAttribs(array('id' => 'datetimepicker2'))
                        ->setRequired(true);

                $cdate = new Zend_Form_Element_Hidden('cdate');

                $mdate = new Zend_Form_Element_Hidden('mdate');

                $status = new Zend_Form_Element_Select('status');
                $status->addMultiOptions(array(
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'unpublished' => 'Unpublished',
                    'deleted' => 'Deleted'
                ));

                $this->addElements(array($aid, $article_type, $title, $lat, $lgt, $stime, $etime, $cdate, $mdate, $status));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
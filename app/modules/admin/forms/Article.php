<?php 

class Admin_Form_Article extends Zend_Form 
{	

        public function init() 
        {
                $aid = new Zend_Form_Element_Hidden('aid');

                $title = new Zend_Form_Element_Text('title');
                $title->setLabel('Title')->setAttribs(array('class'=>'full'));
                
                $article_type = new Zend_Form_Element_Text('article_type');
                $article_type->setLabel('Article Type');

                $lat = new Zend_Form_Element_Text('lat');
                $lat->setLabel('Latitude');

                $lgt = new Zend_Form_Element_Text('lgt');
                $lgt->setLabel('Longitude');

                $stime = new Zend_Form_Element_Text('stime');
                $stime->setLabel('Begin')->setAttribs(array('id' => 'datetimepicker'));

                $etime = new Zend_Form_Element_Text('etime');
                $etime->setLabel('End')->setAttribs(array('id' => 'datetimepicker2'));

                $cdate = new Zend_Form_Element_Hidden('cdate');
                
                $mdate = new Zend_Form_Element_Hidden('mdate');

                $status = new Zend_Form_Element_Select('status');
                $status->setLabel('Status');
                $status->addMultiOptions(array(
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'unpublished' => 'Unpublished',
                    'deleted' => 'Deleted'
                ));
                
                
                
                $hid = new Zend_Form_Element_Select('hid');
                $hid->setLabel('Hotel');
                $hotel_table = new Admin_Model_DbTable_Hotels();
                $hotels = $hotel_table->getHotelNames();
                if ($hotels) {
                    foreach ($hotels as $h) {
                        $hid->addMultiOption($h['hid'], $h['name']);
                    }
                }
                
                
                $tid = new Zend_Form_Element_Select('tid');
                $tid->setLabel('Taxo');
                $taxo_table = new Admin_Model_DbTable_Taxonomies();
                $taxonomies = $taxo_table->getTaxonomyNames();
                if ($taxonomies) {
                    foreach ($taxonomies as $t) {
                        $tid->addMultiOption($t['tid'], $t['name']);
                    }
                }
                
                $submit = new Zend_Form_Element_Submit('submit');

                $this->addElements(array($aid, $article_type, $title, $lat, $lgt, $stime, $etime, $cdate, $mdate, $status, $hid, $tid, $submit));

                foreach($this->getElements() as $element) {
                    $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
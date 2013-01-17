<?php 

class Admin_Form_World extends Zend_Form 
{
    
        public function init() 
        {
                $wid = new Zend_Form_Element_Hidden('wid');

                $parent_id = new Zend_Form_Element_Select('parent_id');
                $parent_id->setRequired(true);
                $table_world = new Admin_Model_DbTable_World();
                $parents = $table_world->getParents();
                if ($parents){
                        $parent_id->addMultiOption(0, '&nbsp;');
                        foreach ($parents as $p) {
                                $parent_id->addMultiOption($p['wid'], $p['title']);
                        }
                }
                

                $lat = new Zend_Form_Element_Text('lat');
        
                $lgt = new Zend_Form_Element_Text('lgt');
        
                $title = new Zend_Form_Element_Text('title');
                $title->setRequired(true);
                
                $this->addElements(array($wid, $parent_id, $lat, $lgt, $title));
        
                foreach($this->getElements() as $element) {
                        $element->removeDecorator('DtDdWrapper')->removeDecorator('HtmlTag')->removeDecorator('Label');
                }
        }

}

?>
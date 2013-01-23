<?php

class Api_TaxonomiesController extends Zend_Controller_Action 
{

        public function init() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();
                
                $this->table = new Admin_Model_DbTable_Taxonomies();    
        }

        public function indexAction() 
        {
                $taxonomies = $this->table->getTaxonomies();
                echo $taxonomies ? json_encode($taxonomies) : json_encode(array('error'=>'0')); 
        }

}
?>
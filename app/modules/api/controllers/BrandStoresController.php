<?php

class Api_BrandStoresController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();
                
                $this->table = new Admin_Model_DbTable_BrandStores();    
        }

        public function indexAction() 
        {
                $brands = $this->table->getBrandStores();
                echo $brands ? json_encode($brands) : json_encode(array('error'=>'0')); 
        }
}


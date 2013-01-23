<?php

class Api_BrandsController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();
                
                $this->table = new Admin_Model_DbTable_Brands();    
        }

        public function indexAction() 
        {
                $brands = $this->table->getBrands();
                echo $brands ? json_encode($brands) : json_encode(array('error'=>'0')); 
        }
}

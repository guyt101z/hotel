<?php

class Api_LanguagesController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();
                
                $this->table = new Admin_Model_DbTable_Languages();    
        }

        public function indexAction() 
        {
                $languages = $this->table->getLanguages();
                echo $languages ? json_encode($languages) : json_encode(array('error'=>'0')); 
        }
}


<?php

class Api_WorldController extends Zend_Controller_Action 
{

        public function init() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();
                
                $this->table = new Admin_Model_DbTable_World();    
                $this->translate_world_table = new Admin_Model_DbTable_TranslateWorld();
                
        }

        public function indexAction() 
        {
                $world = $this->table->getWorld();
                echo $world ? json_encode($world) : json_encode(array('error'=>'0')); 
        }
        
}
?>
<?php

class Api_HotelsController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();
                
                $this->table = new Admin_Model_DbTable_Hotels();    
        }

        public function indexAction() 
        {
                $hotels = $this->table->getHotels();
                echo $hotels ? json_encode($hotels) : json_encode(array('error'=>'0')); 
        }
        
        public function getAction()
        {
                $hid = $this->_request->getParam('hid');
                if ($hid) {
                    $hotels = $this->table->getTranslateHotels($hid);
                    echo $hotels ? json_encode($hotels) : json_encode(array('error'=>'0')); 
                } else {
                    echo json_encode(array('error'=>'0'));
                }
        }
        
}

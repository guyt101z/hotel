<?php

class LanguagesController extends Zend_Controller_Action
{
    public function init() 
    {
  //      $this->_helper->getHelper('layout')->disableLayout();
   //     $this->_helper->viewRenderer->setNoRender();
        $this->table = new Admin_Model_DbTable_Languages();
    }
    
    public function indexAction()
    {	
        $languages = $this->table->getLanguages();
        
        if ($languages && is_array($languages))
            echo $this->_helper->json($languages);
        else 
            echo $this->_helper->json(array('error' => 500));
    }
    
    /**
     * Retrieve languages by hotel id
     */
    public function hotelAction() 
    {
        $id = $this->_request->getParam('hid');
        
        if ($id){
            $languages = $this->table->getLanguagesByHotelId($id);
            if ($languages && is_array($languages))
                echo $this->_helper->json($languages);
            else 
                echo $this->_helper->json(array('error' => 500));
        } else
            echo $this->_helper->json(array('error' => 500));
    }
  
}

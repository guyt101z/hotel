<?php

class MessagesController extends Zend_Controller_Action
{
    public function init() 
    {
        $this->_helper->getHelper('layout')->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        $this->table = new Admin_Model_DbTable_Messages();
    }
    
    public function indexAction()
    {	
        $messages = $this->table->getMessages();
        
        if ($messages && is_array($messages))
            echo $this->_helper->json($messages);
        else 
            echo $this->_helper->json(array('error' => 500));
    }
    
    /**
     * Retrieve languages by hotel id
     */
    public function hotelAction() 
    {
        $id = $this->_request->getParam('hid', false);
        $status = $this->_request->getParam('status', false);
        
        if ($id){
            $messages = $status ? $this->table->getMessagesByHotelId($id, $status) : $this->table->getMessagesByHotelId($id);

            if ($messages && is_array($messages))
                echo $this->_helper->json($messages);
            else 
                echo $this->_helper->json(array());
        } else
            echo $this->_helper->json(array('error' => 500));
    }
  
}

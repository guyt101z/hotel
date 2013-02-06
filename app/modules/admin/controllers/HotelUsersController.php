<?php

class Admin_HotelUsersController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->view->selectedHotelUsers = true;
                $this->table = new Admin_Model_DbTable_HotelUsers();
        }

        public function indexAction() 
        {
                $this->view->focusRowArray = $this->table->getHotelUsers();
        }
        
        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $result = $this->table->addHotel($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                }
                
                $this->render('form');
        }
        
        public function viewAction() 
        {
            // get hid
            $id = $this->_request->getParam('id');

            if ($id) {
                $this->view->form = new Admin_Form_TranslateHotel(array(
                    'method' => 'post'
                ));
                $focusRowArray = $this->table->getHotelLeftJoinTranslateHotel($id);
                $this->view->focusRowArray = $focusRowArray;
                $this->view->id = $id;
            }
        }

        
        
        public function addTrAction()
        {
                
                $id = $this->_request->getParam('id');
                $form = new Admin_Form_TranslateHotel(array('method' => 'post'));
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->addTrHotel($data)) {
                            $this->_redirect('/admin/hotels/view/id/' . $data['hid']);
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $this->view->data = array(
                        'hid'=>$id, 
                        'hotel_name'=> $this->table->getHotelName($id)
                    );
                }
                
                $this->view->form = $form;
        }


        public function editAction() 
        {
                $form = $this->_getForm();
                $id = $this->_request->getParam('id');
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->updateLanguage($id, $data)) {
                            $this->_helper->redirector('index');
                        } else {
                            throw new Zend_Exception('Error occured while adding a new language. ');
                        }
                    }
                } else {
                    
                    $data = $this->table->getLanguageById($id);
                    $form->populate($data);
                }
                
                $this->render('form');
        }
        
        public function editTrAction()
        {
                $form = new Admin_Form_TranslateHotel(array('method' => 'post'));
                
                $id = $this->_request->getParam('id');
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->updateTrHotel($id, $data)) {
                            $this->_redirect('/admin/hotels/view/id/' . $data['hid']);
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $data = $this->table->getTrHotel($id);
                    $form->populate($data);
                    $this->view->data = $data;
                }
                $this->view->form = $form;
        }

        public function deleteAction() 
        {
                $id = $this->getRequest()->getParam('id');
                
                if ($this->table->deleteLanguageById($id))  
                    $this->_helper->redirector('index');
                else 
                    throw new Zend_Exception('error occured while deleting this language. ');
        }

    
        private function _getForm() 
        {
                $form = new Admin_Form_HotelUser(array(
                    'method' => 'post'
                ));

                $this->view->form = $form;
                return $form;
        }
}


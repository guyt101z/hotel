<?php

class Admin_UsersController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->view->selectedUsers = true;
                $this->table = new Admin_Model_DbTable_Users();
        }

        public function indexAction() 
        {
                $this->view->users = $this->table->getUsers();
        }

        public function addAction() 
        {
                $form = $this->_getForm();
                $form->removeElement('pwd');
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->addUser($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                }
                
                $this->render('form');
        }


        public function editAction() 
        {
                $form = $this->_getForm();
                $form->removeElement('pwd');
                $id = $this->_request->getParam('id');
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->updateUser($id, $data)) {
                            $this->_helper->redirector('index');
                        } else {
                            throw new Zend_Exception('Error occured while adding a new language. ');
                        }
                    }
                } else {
                    $data = $this->table->getUser($id);
                    $form->populate($data->toArray());
                }
                
                $this->render('form');
        }

        public function deleteAction() 
        {
                $id = $this->getRequest()->getParam('id');
                
                if ($this->table->deleteUser($id))  
                    $this->_helper->redirector('index');
                else 
                    throw new Zend_Exception('error occured while deleting this language. ');
        }

    
        private function _getForm() 
        {
                $form = new Admin_Form_User(array(
                    'method' => 'post'
                ));

                $this->view->form = $form;
                return $form;
        }
}


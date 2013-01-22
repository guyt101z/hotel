<?php

class Admin_BrandStoresController extends Zend_Controller_Action 
{
	
        public function init() 
        {
                $this->view->selectedBrandStores = true;
                $this->table = new Admin_Model_DbTable_BrandStores();
        }

        public function indexAction() 
        {
                $this->view->stores = $this->table->getBrandStores();
        }

        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->addBrandStore($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                }
                
                $this->render('form');
        }
        
        public function addLocaleAction() 
        {
                $form = $this->_getForm();
                $tr_bsid = $this->_request->getParam('tr_bsid');
                
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->addTranslateBrandStore($data)) {
                            $this->_helper->redirector('index');
                        } else {
                            throw new Zend_Exception('Error occured while adding a new locale');
                        }
                    }
                    
                } else {
                    $data = $this->table->getTranslateBrandStore($tr_bsid);
                    $form->populate($data);
                }
                
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
                $form = new Admin_Form_BrandStore(array(
                    'method' => 'post'
                ));

                $this->view->form = $form;
                return $form;
        }
}


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
        
        public function editAction() 
        {
                $form = $this->_getForm();
                $id = $this->_request->getParam('id');
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->updateBrandStore($id, $data)) {
                            $this->_helper->redirector('index');
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $data = $this->table->getBrandStore($id);
                    $form->populate($data);
                }
                
                $this->render('form');
        }
        
        public function editTrAction()
        {
                $form = new Admin_Form_TranslateBrandStore(array(
                    'method' => 'post'
                ));
                $id = $this->_request->getParam('id');
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->updateTrBrandStore($id, $data)) {
                            $this->_redirect('/admin/brand-stores/view/id/' . $data['bsid']);
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $data = $this->table->getTrBrandStore($id);
                    $form->populate($data);
                    $this->view->data = $data;
                }
                $this->view->form = $form;
        }
        
        public function viewAction() 
        {
            $id = $this->_request->getParam('id');

            if ($id) {
                $this->view->tr_bs_form = new Admin_Form_TranslateBrandStore(array(
                    'method' => 'post'
                ));
                $focusRowArray = $this->table->getBrandStoreLeftJoinTranslateBrandStore($id);
                $this->view->focusRowArray = $focusRowArray;
                $this->view->id = $id;
            }
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
        
        
        // unused actions
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
}


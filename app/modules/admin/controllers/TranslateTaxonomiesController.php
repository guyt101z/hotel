<?php

class Admin_TranslateTaxonomiesController extends Zend_Controller_Action 
{

        public function init() 
        {
                $this->view->selectedTaxonomies = true;
                $this->table = new Admin_Model_DbTable_TranslateTaxonomies();
        }

        public function indexAction() 
        {
                $this->view->focusRowArray = $this->table->getTranslateTaxonomies();
                $this->view->error_message =  $this->_helper->getHelper('FlashMessenger')->getMessages();
        }
        
        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->addTranslateTaxonomy($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                }
        }
        
        
        public function editAction() 
        {
            $form = $this->_getForm();
            
            $id = $this->_request->getParam('id');
            
            if ($id) {
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->updateTranslateTaxonomy($id, $data);
                        $this->_redirect('/admin/translate-taxonomies');
                    }
                } else {
                    $data = $this->table->getTranslateTaxonomy($id);
                    $form->populate($data); 
                    $this->view->data = $data;
                }
            } else {
                throw new Exception ('URL is not valid');
            }
            
        }
        
        
        public function deleteAction()
        {
                $wid = $this->_request->getParam('wid');
                if ($wid) {
                    $this->table->deleteWorldSQL($wid);
                    
                }
                $this->_redirect('/admin/world');
        }
        
        public function viewAction() 
        {
            $id = $this->_request->getParam('id');

            $this->view->id = $id;

            $this->view->focusRowArray = $this->table->getWorldRightJoinTranslateWorld($id);
        }
    
    
        private function _getForm() 
        {
            $form = new Admin_Form_TranslateTaxonomy(array(
                'method' => 'post'
            ));

            $this->view->form = $form;
            return $form;
        }

}
?>
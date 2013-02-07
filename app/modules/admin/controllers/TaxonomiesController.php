<?php

class Admin_TaxonomiesController extends Zend_Controller_Action 
{

        public function init() 
        {
                $this->table = new Admin_Model_DbTable_Taxonomies();    
                $this->view->selectedTaxonomies = true;
        }

        public function indexAction() 
        {
                $this->view->focusRowArray = $this->table->getTaxonomies();
        }

        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->addTaxonomy($data);
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

                if ($id) {
                    if ($this->_request->isPost()) {
                        $data = $this->_request->getPost();
                        if ($form->isValid($data)) {
                            $this->table->updateTaxonomy($id, $data);
                            $this->_helper->redirector('index');
                        }
                    } else {
                        $data = $this->table->getTaxonomy($id);
                        $form->populate($data); 
                        $this->view->data = $data;
                    }
                } else {
                    throw new Exception ('URL is not valid');
                }
                
                $this->render('form');
        }
        
        public function deleteAction() 
        {
                $id = $this->_request->getParam('id');
                if ($id) 
                    $this->table->deleteTaxonomy($id);
                $this->_helper->redirector();
        }
    
        public function viewAction() {
                $id = $this->_request->getParam('id');

                $this->view->focusRowArray = $this->table->getTaxonomyByTid($id);
        }
    
        private function _getForm() 
        {
                $form = new Admin_Form_Taxonomy(array(
                    'method' => 'post'
                ));

                $this->view->form = $form;
                return $form;
        }
}
?>
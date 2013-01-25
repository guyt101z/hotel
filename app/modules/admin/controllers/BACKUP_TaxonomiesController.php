<?php

class Admin_TaxonomiesController extends Zend_Controller_Action 
{

        public function init() {
            $this->table = new Admin_Model_DbTable_Taxonomies();    
            $this->view->selectedTaxonomies = true;
        }

        /**
         * list regions
         */
        public function indexAction() {
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
                
                $id = $this->_request->getParam('tr_tid');
                if ($id) {
                    
                    if ($this->_request->isPost()) {
                        $data = $this->_request->getPost();
                        if ($form->isValid($data)) {
                            $this->table->updatePage($data, $id);
                            $this->_redirect('/admin/pages/view/id/' . $this->table->getParentId($id)->parent_id);
                        }
                    } else {

                        $data = $this->table->getTranslateTaxo($id);
                        $form->populate($data);
                        //$this->view->id = $id;
                    }
                        
                }
                
                $this->render('tr-form');
        }
    
    public function viewAction() {
        $id = $this->_request->getParam('id');
        
        $this->view->focusRowArray = $this->table->getTaxonomyByTid($id);
    }
    
    
    
    private function _getForm() {
        $form = new Admin_Form_Taxonomy(array(
            'method' => 'post'
        ));

        $this->view->form = $form;
        return $form;
    }
}
?>
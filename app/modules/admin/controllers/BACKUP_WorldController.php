<?php

class Admin_WorldController extends Zend_Controller_Action 
{

        public function init() 
        {
                $this->view->selectedWorld = true;
                $this->table = new Admin_Model_DbTable_World();    
                $this->translate_world_table = new Admin_Model_DbTable_TranslateWorld();
        }

        public function indexAction() 
        {
                $this->view->focusRowArray = $this->table->getWorld();
                $this->view->error_message =  $this->_helper->getHelper('FlashMessenger')->getMessages();
        }
        
        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        //$this->table->addWorldSingleLocale($data);
                        $this->table->addWorldSQL($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                }
        }
        
        
        public function editAction() 
        {
            $form = $this->_getForm();
            
            $id = $this->_request->getParam('wid');
            
            if ($id) {
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->updateWorldSQL($id, $data);
                        $this->_redirect('/admin/world');
                    }
                } else {
                    $data = $this->table->getWorld($id);
                    $form->populate($data[0]); 
                    $this->view->data = $data[0];
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
        
        public function addLocaleAction()
        {
                $form = $this->_getForm();
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->addTranslateWorld($data)) {
                            $this->_redirect('/admin/world');
                        } else {
                            $this->_helper->getHelper('FlashMessenger')->addMessage('errors ocurred while adding a new locale. ');  
                        }
                        $this->_redirect('/admin/world');
                    }
                    
                } else { 
                    $tr_wid = $this->_request->getParam('id');
                    if ($tr_wid) {
                        $data= $this->table->getTranslateWorldById($tr_wid);
                        $form->populate($data);
                    }
                }
                
                $this->render('trw-form');
        }
        
        public function viewAction() 
        {
            $id = $this->_request->getParam('id');

            $this->view->id = $id;

            $this->view->focusRowArray = $this->table->getWorldRightJoinTranslateWorld($id);
        }
    

        
        public function ajaxGetLocaleByWid() 
        {
                $this->_helper->getHelper('layout')->disableLayout();
                $this->_helper->viewRenderer->setNoRender();

                $wid = $this->getRequest()->getParam('id');
                if ($wid) {
                        $title = $this->table->getLocaleByWid($wid);
                        echo json_encode($title);
                }
                echo '0';
        }
    
        private function _getForm() 
        {
            $form = new Admin_Form_World(array(
                'method' => 'post'
            ));

            $this->view->form = $form;
            return $form;
        }
        
        private function _getTranslateWorldForm()
        {
                $form = new Admin_Form_TranslateWorld(array(
                    'method' => 'post'
                ));
                $this->view->form = $form;
                return $form;
        }
}
?>
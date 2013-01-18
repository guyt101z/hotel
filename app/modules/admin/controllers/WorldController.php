<?php

class Admin_WorldController extends Zend_Controller_Action 
{

        public function init() 
        {
            $this->view->selectedWorld = true;
            $this->table = new Admin_Model_DbTable_World();    
            //$this->view->types = array('1'=>'region', '2'=>'country', '3'=>'city');
        }

        public function indexAction() 
        {
                $this->view->focusRowArray = $this->table->getWorld();
                //die(print_r($this->view->focusRowArray));
        }
        
        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $this->table->addWorld($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                }
                
                $this->render('form');
        }
        
        public function viewAction() 
        {
            $id = $this->_request->getParam('id');

            $this->view->id = $id;

            $this->view->focusRowArray = $this->table->getWorldRightJoinTranslateWorld($id);
        }
    
        public function editAction() {
            $form = $this->_getForm();

            if ($this->_request->isPost()) {
                $data = $this->_request->getPost();
                if ($form->isValid($data)) {
                    $id = $form->getValue('page_id');
                    $this->table->updatePage($data, $id);
                    $this->_redirect('/admin/pages/view/id/' . $this->table->getParentId($id)->parent_id);
                }
            } else {
                $id = $this->_request->getParam('id');
                if ($id) {
                    $data = $this->table->getPage($id, true);
                    $form->populate($data[0]);
                    $this->view->page = $data[0];
                }
                $this->view->id = $id;
            }
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
}
?>
<?php

class Admin_ArticlesController extends Zend_Controller_Action  
{
    
        public function init()
        {
                $this->view->selectedArticles = true;
                $this->table = new Admin_Model_DbTable_Articles();
        }
        
        public function indexAction() 
        {
                $this->view->articles = $this->table->getArticles();
        }
        
        public function addAction() 
        {
                $form = $this->_getForm();

                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    $data['cdate'] = new Zend_Db_Expr('NOW()');
                    if ($form->isValid($data)) {
                        $this->table->addArticle($data);
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
                        if ($this->table->updateArticle($id, $data)) {
                            $this->_helper->redirector('index');
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $data = $this->table->getArticle($id);
                    $form->populate($data);
                }
                
                $this->render('form');
        }
        
        public function viewAction()
        {
                $id = $this->getRequest()->getParam('id');
                $this->view->article = $this->table->getArticle($id);
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
                $form = new Admin_Form_Article(array(
                    'method' => 'post'
                ));

                $this->view->form = $form;
                return $form;
        }
}


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
                        $data2= array();
                        $data2['hid'] = $data['hid'];
                        $data2['tid'] = $data['tid'];
                        unset($data['hid']);
                        unset($data['tid']);
                        $aid = $this->table->addArticle($data);
                        if ($aid) {
                            $data2['aid'] = $aid;
                            $hotel_article_taxo_table = new Admin_Model_DbTable_HotelArticleTaxo();
                            $hotel_article_taxo_table->addHotelArticleTaxo($data2);
                        }
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
                $this->view->translate_article = $this->table->getTranslateArticle($id);
                // will change to full join later.
                //$this->view->article = $this->table->getArticlesFullJoinTranslateArticles($id);
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


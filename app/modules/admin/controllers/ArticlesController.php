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
        
        public function addTrAction()
        {
        
                // get aid
                $id = $this->_request->getParam('id');
                $form = new Admin_Form_TranslateArticle(array('method' => 'post'));
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->addTrArticle($data)) {
                            $this->_redirect('/admin/articles/view/id/' . $data['aid']);
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $this->view->data = array(
                        'aid'=>$id, 
                        'article_title'=> $this->table->getArticleTitle($id)
                    );
                }
                
                $this->view->form = $form;
        }
        
        public function editTrAction()
        {
                $form = new Admin_Form_TranslateArticle(array('method' => 'post'));
          
                $id = $this->_request->getParam('id');
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        if ($this->table->updateTrArticle($id, $data)) {
                            $this->_redirect('/admin/articles/view/id/' . $data['aid']);
                        } else {
                            throw new Zend_Exception('Error occured');
                        }
                    }
                } else {
                    $data = $this->table->getTranslateArticle($id);
                    $form->populate($data);
                    $this->view->data = $data;
                }
                $this->view->form = $form;
        }

        public function viewAction() 
        {
            $id = $this->_request->getParam('id');

            if ($id) {
                $this->view->focusRowArray = $this->table->getArticleLeftJoinTranslateArticle($id);
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
                $form = new Admin_Form_Article(array(
                    'method' => 'post'
                ));

                $this->view->form = $form;
                return $form;
        }
}


<?php

class Api_IndexController extends Zend_Controller_Action
{
	
        public function init()
        {
        }

        public function indexAction()
        {
                $this->_helper->getHelper('layout')->disableLayout();
                
                $form = new Api_Form_Request(array('method' => 'post'));
                $request_table = new Api_Model_DbTable_Requests();
                
                if ($this->_request->isPost()) {
                    $data = $this->_request->getPost();
                    if ($form->isValid($data)) {
                        $request_table->addRequest($data);
                        $this->_helper->redirector('index');
                    } else {
                        $form->populate($data);
                    }
                } else {
                    $requests = $request_table->getRequests();
                    $this->view->requests = $requests;
                }
                
                $this->view->request_form = $form;
        }

}
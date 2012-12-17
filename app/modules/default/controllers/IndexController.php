<?php

class IndexController extends Zend_Controller_Action
{

	public function init()
	{
            //$this->_helper->getHelper('layout')->disableLayout();
            //$this->_helper->viewRenderer->setNoRender();
            $this->_helper->layout->setLayout('home');
	}
	
	public function indexAction()
	{
		
		
		
	}

	
	
	
}
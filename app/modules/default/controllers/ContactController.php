<?php

class ContactController extends Zend_Controller_Action
{
    public function init() {
        $actionStack = Zend_Controller_Action_HelperBroker::getStaticHelper('actionStack');
        $actionStack->actionToStack('calculate', 'widge');
        $actionStack->actionToStack('quote', 'widge');
        $actionStack->actionToStack('benefit', 'widge');
        $actionStack->actionToStack('transport', 'widge');
        $actionStack->actionToStack('work', 'widge');
        $this->table = new Admin_Model_DbTable_Pages();
    }
    
    public function indexAction() {
        $this->view->page = $this->table->getPageByNameAndParentId('index', 8);
        $this->render('page');
    }
}
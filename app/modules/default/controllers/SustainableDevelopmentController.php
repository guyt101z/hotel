<?php

class SustainableDevelopmentController extends Zend_Controller_Action {
    
    public function init() {
        $actionStack = Zend_Controller_Action_HelperBroker::getStaticHelper('actionStack');
        $actionStack->actionToStack('metiers', 'widge');
        $actionStack->actionToStack('quote', 'widge');
        $actionStack->actionToStack('benefit', 'widge');
        $actionStack->actionToStack('transport', 'widge');
        $actionStack->actionToStack('work', 'widge');
        $this->table = new Admin_Model_DbTable_Pages();
    }
    
    public function indexAction() {
        $this->_helper->redirector('policy-qhse');
    }
    
    public function policyQhseAction() {
        $this->view->page = $this->table->getPageByName('policy-qhse');
        $this->render('page');
    }
    
    public function ecoCalculatorAction() {
        $this->view->page = $this->table->getPageByName('eco-calculator');
        $this->render('page');
    }
    
}

?>

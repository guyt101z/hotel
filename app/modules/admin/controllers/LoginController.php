<?php
//Sell_!@2012
class Admin_LoginController extends Zend_Controller_Action
{
    private $_auth = null;

    /**
     * Initialisation Zend Auth
     * 
     * @return void
     */
    public function init()
    {
        $this->_auth = Zend_Auth::getInstance();
        $this->_helper->getHelper('layout')->disableLayout();
        $this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
    }

    /**
     * Index Action (afficher le formulaire)
     * 
     * @return void
     */
    public function indexAction()
    {
        $this->view->loginForm = $this->_getForm();
    }

    /**
     * Not implemented yet
     */
    public function forgotpasswordAction()
    {
    }

    /**
     * Process d'identification
     * 
     * @return void
     */
    public function processAction()
    {
        $this->_helper->getHelper('viewRenderer')->setNoRender();
        $request = $this->getRequest();

        if (!$request->isPost()) {
            return $this->_helper->redirector('index');
        }

        $form = $this->_getForm();

        if ($this->_processAuth($request->getPost()) && $form->isValid($request->getPost())) {
            $this->_helper->redirector('index', 'dashboard');
        } else {
            $this->_helper->getHelper('FlashMessenger')->addMessage('Identification error. Veuillez réitérer votre identification.');
            $this->_helper->redirector('index');
        }
    }

    /**
     * Logout Action
     * 
     * @return void
     */
    public function logoutAction()
    {
            $this->_helper->getHelper('viewRenderer')->setNoRender();

            $this->_auth->clearIdentity();
            $this->_helper->redirector('index');
    }

    /**
     * Config Zend Auth
     * 
     * @return void
     */
    private function _authAdapter()
    {
        $userTable = new Admin_Model_DbTable_Users();
        $auth = new Zend_Auth_Adapter_DbTable(null);

        $auth->setTableName($userTable->getTableName())
                ->setIdentityColumn($userTable->getIdentityColumn())
                ->setCredentialColumn($userTable->getCredentialColumn())
                ->setCredentialTreatment('MD5(?)');

        return $auth;
    }

    /**
     * Check l'user et fourni token Zend Auth dans la session si l'utilisateur est indentifié
     * 
     * @param array $values
     * @return boolean
     */
    private function _processAuth($values)
    {
        $adapter = $this->_authAdapter();
        
        $adapter->setIdentity($values['email']);
        $adapter->setCredential($values['pwd']);

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);

        if ($result->isValid()) {
            $userTable = new Admin_Model_DbTable_Users();

            $user = $adapter->getResultRowObject(array(
                $userTable->getPrimaryKey(),
                $userTable->getIdentityColumn(),
            ));

            //$userTable->update(array(
                //'last_login_ts' => new Zend_Db_Expr('NOW()'),
                //'ip' =>  $this->getRequest()->getClientIp()
            //), array('uid = ?' => $user->uid));

            $auth->getStorage()->write($user);
            return true;
        }

        return false;
    }
	
    /**
     * Recupere le formulaire
     * 
     * @return Zend_Form
     */
    private function _getForm()
    {
        $loginForm = new Admin_Form_Login(array(
            'action' => '/admin/login/process',
            'method' => 'post'
        ));

        return $loginForm;
    }
}

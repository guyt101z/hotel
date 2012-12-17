<?php

class Carburant_Controller_Plugin_AdminLogged extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $module = $request->getModuleName();
        $controller = $request->getControllerName();

        if($module == 'admin') {
            $auth = Zend_Auth::getInstance();

            if ($auth->hasIdentity()) {
                $layout = Zend_Layout::getMvcInstance();
                $view = $layout->getView();
                $view->email = $auth->getIdentity()->email;
            } else {
                if($controller != 'login') {
                    $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                    $redirector->setGotoSimple('index', 'login', 'admin');
                }
            }
        }
    }
}

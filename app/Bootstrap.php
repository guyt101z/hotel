<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	
    protected function _initAutoload()
    {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->setFallbackAutoloader(true);
        return $autoloader;
    }

    protected function _initSessionNamespaces()
    {
        $this->bootstrap('session');
        $params = $this->getOption('resources');
        $namespace = new Zend_Session_Namespace($params['session']['name']);
        Zend_Registry::set('session', $namespace);
    }

    /**
     * Permet de charger les plugins
     * 
     * @return void
     */
    protected function _initLoadPlugins()
    {
        // On recupérer le Controller Frontal
        $front = Zend_Controller_Front::getInstance();
        // Enregistrement des plugins
        $front->registerPlugin(new Carburant_Controller_Plugin_ViewSetup());
        $front->registerPlugin(new Carburant_Controller_Plugin_LoadLayout());
        $front->registerPlugin(new Carburant_Controller_Plugin_LangSelector());
    }
	
    protected function _initNavigation()
    {
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        
        $config = new Zend_Config_Xml(APP_PATH . '/configs/navigation.xml');
        $navigation = new Zend_Navigation($config);
        Zend_Registry::set('navigation_fr', $navigation);
        
        $navigation_en = new Zend_Navigation(new Zend_Config_Xml(APP_PATH . '/configs/navigation_en.xml'));
        Zend_Registry::set('navigation_en', $navigation_en);
        
        $view->navigation($navigation);
        $view->navigation($navigation_en);
        
    }
}


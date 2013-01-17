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
        
        protected function _initConfig()
	{
		$config = new Zend_Config($this->getOptions(), true);
		Zend_Registry::set('config', $config);
		return $config;
	}

        protected function _initLoadPlugins()
        {
            $front = Zend_Controller_Front::getInstance();
            $front->registerPlugin(new Carburant_Controller_Plugin_ViewSetup());
            $front->registerPlugin(new Carburant_Controller_Plugin_LoadLayout());
            $front->registerPlugin(new Carburant_Controller_Plugin_LangSelector());
        }

}


<?php

class Api_Bootstrap extends Zend_Application_Module_Bootstrap
{
	
	protected function _initAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
			'namespace' => 'Api_',
			'basePath'  => APP_PATH .'/modules/api',
			'resourceTypes' => array (
				'form' => array(
					'path' => 'forms',
					'namespace' => 'Form',
				),
				'model' => array(
					'path' => 'models',
					'namespace' => 'Model',
				),
			)
		));
		
		return $autoloader;
	}
	
	protected function _initLoadPlugins()
	{
		$front = Zend_Controller_Front::getInstance();
		//$front->registerPlugin(new Carburant_Controller_Plugin_AdminLogged());
	}
}
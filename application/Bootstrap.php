<?php

/**
 * Application bootstrap.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	application
 * @package		Bootstrap
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Bootstrap autoloader for application resources
	 *
	 * @return Zend_Application_Module_Autoloader
	 */
	protected function _initAutoload()
	{
		$config = $this->getOption('autoloader');
		$autoloader = new Zend_Loader_Autoloader_Resource($config);

		return $autoloader;
	}

	/**
	 * Initialises the routes using the configuration file.
	 */
	protected function _initRouter()
	{
		$cfgPath = $this->getOption('configPath');
		$config = new Zend_Config_Ini($cfgPath . 'routes.ini', 'production');

		$front = Zend_Controller_Front::getInstance();
		$router = $front->getRouter();
		$router->addConfig($config, 'routes');
	}

	/**
	 * Initialises the view.
	 *
	 * @return Zend_View $view   The View Object.
	 */
	protected function _initView()
	{
		$view = new Zend_View();
		$view->doctype('HTML5');
		$view->headTitle('Link-Fu');
		$view->skin = 'default';

		$jquery = 'jquery.min.js';
		if (APPLICATION_ENV === 'development') {
			$jquery = 'jquery.js';
		}

		$view->headScript()->appendFile('/js/' . $jquery, Foo_Controller_Abstract::MIME_JS);
		$view->headScript()->appendFile('/js/Trigger.js', Foo_Controller_Abstract::MIME_JS);

		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
		$viewRenderer->setView($view);

		// @todo set sublayout dynamicaly
		$view->subLayout = 'standard';

		return $view;
	}

	protected function _initHelper()
	{
		Zend_Controller_Action_HelperBroker::addPrefix('Foo_Controller_Action_Helper');
		Zend_Controller_Action_HelperBroker::addPath(
			APPLICATION_PATH . '/../library/Foo/Controller/Action/Helper',
			'Foo_Controller_Action_Helper'
		);
	}

	/**
	 * Initialises the date/timezone settings.
	 */
	protected function _initTimezone()
	{
		// Set date/time zone
		date_default_timezone_set('Europe/Berlin');
	}

	/**
	 * Initializes the feature switch list.
	 */
	protected function _initFeatureSwitch()
	{
		$cfgPath = $this->getOption('configPath');
		$config = new Zend_Config_Ini($cfgPath . 'features.ini', APPLICATION_ENV);

		Zend_Registry::set('features', $config->toArray());
	}
}
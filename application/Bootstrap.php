<?php

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
	}// _initAutoloader()

	/**
	* Initializes the view
	*
	* return Zend_View
	*/
	protected function _initView()
	{
		$view = new Zend_View();
		$view->doctype('HTML5');
		$view->headTitle('Link Fu');
		$view->skin = 'default';

		$view->headMeta()->setCharset('UTF-8');
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=utf-8');
		$view->headMeta()->appendHttpEquiv('Content-Language', 'de-DE');

		$view->headScript()->appendFile('/js/jquery.min.js', 'text/javascript');
		$view->headScript()->appendFile('/js/Trigger.js', 'text/javascript');

		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
			'ViewRenderer'
		);
		$viewRenderer->setView($view);

		$view->addHelperPath('Foo/View/Helper/', 'Foo_View_Helper_');

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
}

<?php

/**
 * Abstract DB table class for the model of mcp admin tool.
 *
 * @author		Sascha Schneider <sascha.schneider@doubleyou.de>
 * @copyright	(c) 2011 DoubleYou GmbH <http://www.doubleyou.de>
 *
 * @category	model
 * @package		Model_Table_Abstract
 */
class Model_Table_Abstract extends Zend_Db_Table_Abstract
{
	const ASC	= ' ASC';
	const DESC	= ' DESC';

	const F_ID			= 'id';
	const F_CREATED		= 'created';
	const F_MODIFIED	= 'modified';

	/**
	 * Lazy initilization of an bootstrap instance
	 */
	protected function getBootstrap(Zend_Application_Bootstrap_Bootstrap $bootstrap = null)
	{
		if (null === $bootstrap) {
			$bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
		}

		return $bootstrap;
	}

	/**
	 * Lazy initilization of the logger.
	 *
	 * @param	Zend_Log $logger	Optional!
	 * @return	Zend_Log
	 */
	protected function getLogger(Zend_Log $logger = null)
	{
		if (null === $logger) {
			$logger = $this->getBootstrap()->getResource('log');
		}

		return $logger;
	}

	/**
	 * Print variables like var_dump() to logger.
	 *
	 * @param mixed $var1, $var
	 * @param mixed $var2
	 */
	protected function debug($var1, $var2 = null)
	{
		$logger = $this->getLogger();

		$argsCount = func_num_args();
		if ($argsCount > 1) {
			$args = func_get_args();

			for ($i = 0; $i < $argsCount; $i++) {
				$logger->log($args[$i], Zend_Log::DEBUG);
			}
		}
		else {
			$logger->log($var1, Zend_Log::DEBUG);
		}
	}
}
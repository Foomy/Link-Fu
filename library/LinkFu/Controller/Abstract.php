<?php

require_once APPLICATION_PATH . '/../library/Foo/Controller/Abstract.php';

/**
 * Base controller for Link-Fu.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	library
 * @package		LinkFu_Controller_Abstract
 */
class LinkFu_Controller_Abstract extends Foo_Controller_Abstract
{
	/**
	 * @var	Foo_Auth_Adapter
	 */
	protected $_auth;

	/**
	 * @var	string
	 */
	protected $_role;

	/**
	 * @var	Foo_Controller_Plugin_Acl
	 */
	protected $_acl;

	public function init()
	{
		parent::init();
	}
}

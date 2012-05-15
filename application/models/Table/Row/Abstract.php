<?php

/**
 * Abstract table class for the Link-Fu model
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	model
 * @package		Model_Table_Row_Abstract
 */
class Model_Table_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
	/**
	 * Contains the identifier for the id field.
	 *
	 * @var	string $_id
	 */
	protected $_id;

	/**
	 * Contains the identifier for the created field.
	 *
	 * @var	string $_created
	 */
	protected $_created;

	/**
	 * Contains the identifier for the modified field.
	 *
	 * @var	string $_modified
	 */
	protected $_modified;

	public function init()
	{
		parent::init();
	}

	/**
	 * Returns the database id of the record set.
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->{$this->_id};
	}// getId()

	/**
	 * Returns the creation timestamp in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function createdOn()
	{
		return $this->{$this->_created};
	}

	/**
	 * Returns the timestamp of the last modification
	 * in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function lastModifiedOn()
	{
		return $this->{$this->_modified};
	}
}
<?php

/**
 * Row class for the tag model. An instance of this
 * class represents a link.
 *
 * +----------+------------------+------+-----+---------------------+----------------+
 * | Field    | Type             | Null | Key | Default             | Extra          |
 * +----------+------------------+------+-----+---------------------+----------------+
 * | id       | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
 * | created  | timestamp        | NO   |     | CURRENT_TIMESTAMP   |                |
 * | modified | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
 * | tagname  | varchar(50)      | YES  |     | NULL                |                |
 * +----------+------------------+------+-----+---------------------+----------------+
 *
 * @category	Link-Fu
 * @package		Model
 * @subpackage	Tag
 * @version		1.0
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Model_Tag extends Zend_Db_Table_Row_Abstract
{
	protected $_primary = Model_Tag_Table::F_ID;

	/**
	 * Returns the database id of the quote.
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->{Model_Tag_Table::F_ID};
	}// getId()

	/**
	 * Returns the creation timestamp in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function getCreated()
	{
		return $this->{Model_Tag_Table::F_CREATED};
	}// getCreated()

	/**
	 * Returns the timestamp of the last modification
	 * in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function getModified()
	{
		return $this->{Model_Tag_Table::F_MODIFIED};
	}// getModified()

	/**
	 * Returns the link reference (href).
	 *
	 * @return string
	 */
	public function getTagname()
	{
		return $this->{Model_Tag_Table::F_TAGNAME};
	}// getReference()

	public function __toString()
	{
		return $this->getTagname();
	}
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

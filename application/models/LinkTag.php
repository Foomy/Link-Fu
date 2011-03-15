<?php

/**
 * Row class for the link model. An instance of this
 * class represents a link.
 *
 * +---------+------------------+------+-----+-------------------+-------+
 * | Field   | Type             | Null | Key | Default           | Extra |
 * +---------+------------------+------+-----+-------------------+-------+
 * | link_id | int(10) unsigned | NO   | MUL | NULL              |       |
 * | tag_id  | int(10) unsigned | NO   | MUL | NULL              |       |
 * | created | timestamp        | NO   |     | CURRENT_TIMESTAMP |       |
 * +---------+------------------+------+-----+-------------------+-------+
 *
 * @category	Link-Fu
 * @package		Model
 * @subpackage	Link
 * @version		1.0
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Model_LinkTag extends Zend_Db_Table_Row_Abstract
{
	protected $_primary = Model_LinkTag_Table::F_ID;

	/**
	 * Returns the database id of the quote.
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->{Model_LinkTag_Table::F_ID};
	}// getId()

	/**
	 * Returns the creation timestamp in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function getCreated()
	{
		return $this->{Model_LinkTag_Table::F_CREATED};
	}// getCreated()

	/**
	 * Returns the timestamp of the last modification
	 * in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function getModified()
	{
		return $this->{Model_LinkTag_Table::F_MODIFIED};
	}// getModified()
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

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

class Model_Tag extends Model_Table_Row_Abstract
{
	protected $_primary = Model_Tag_Table::F_ID;

	public function init()
	{
		parent::init();

		$this->_id = Model_Tag_Table::F_ID;
		$this->_created = Model_Tag_Table::F_CREATED;
		$this->_modified = Model_Tag_Table::F_MODIFIED;
	}

	/**
	 * Returns the link reference (href).
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->{Model_Tag_Table::F_TAGNAME};
	}

	/**
	 * Returns the link reference (href).
	 *
	 * @deprecated
	 */
	public function getTagname()
	{
		return $this->getName();
	}

	public function setName($name)
	{
		$this->{Model_Tag_Table::F_TAGNAME} = $name;
	}

	/**
	 * Controls the output if this class ist converted to a string.
	 *
	 * @return	atring
	 */
	public function __toString()
	{
		return $this->getTagname();
	}
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

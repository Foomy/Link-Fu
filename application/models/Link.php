<?php

/**
 * Row class for the link model. An instance of this
 * class represents a link.
 *
 * +-----------+------------------+------+-----+---------------------+----------------+
 * | Field     | Type             | Null | Key | Default             | Extra          |
 * +-----------+------------------+------+-----+---------------------+----------------+
 * | id        | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
 * | created   | timestamp        | NO   |     | CURRENT_TIMESTAMP   |                |
 * | modified  | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
 * | reference | varchar(4096)    | NO   |     | NULL                |                |
 * | linktext  | varchar(255)     | NO   |     |                     |                |
 * +-----------+------------------+------+-----+---------------------+----------------+
 *
 * @category	Link-Fu
 * @package		Model
 * @subpackage	Link
 * @version		1.0
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Model_Link extends Zend_Db_Table_Row_Abstract
{
	protected $_primary = Model_Link_Table::F_ID;

	/**
	 * Returns the database id of the quote.
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->{Model_Link_Table::F_ID};
	}// getId()

	/**
	 * Returns the creation timestamp in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function getCreated()
	{
		return $this->{Model_Link_Table::F_CREATED};
	}// getCreated()

	/**
	 * Returns the timestamp of the last modification
	 * in the format "Y.m.d H:i:s".
	 *
	 * @return string
	 */
	public function getModified()
	{
		return $this->{Model_Qutoe_Peer::F_MODIFIED};
	}// getModified()

	/**
	 * Returns the link reference (href).
	 *
	 * @return string
	 */
	public function getReference()
	{
		return $this->{Model_Link_Table::F_REFERENCE};
	}// getReference()

	/**
	 * Returns the link text.
	 *
	 * @return string
	 */
	public function getLinktext()
	{
		return $this->{Model_Link_Table::F_LINKTEXT};
	}// getAuthor()
	
	/**
	 * Set the the reference field to the given value.
	 *
	 * @param string $reference
	 * @return Model_Link
	 */
	public function setReference($reference)
	{
		$this->{Model_Link_Table::F_REFERENCE} = $reference;
		return $this; 
	}
	
	/**
	 * Sets the link text field to the given value.
	 * 
	 * @param string $linktext
	 * @return Model_Link
	 */
	public function setLinktext($linktext)
	{
		$this->{Model_Link_Table::F_LINKTEXT} = $linktext;
		return $this;
	}
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

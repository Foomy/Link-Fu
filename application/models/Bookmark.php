<?php

/**
 * Row class for the Bookmark model. An instance of this
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
 * @subpackage	Bookmark
 * @version		1.0
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Model_Bookmark extends Model_Table_Row_Abstract
{
	protected $_primary = Model_Bookmark_Table::F_ID;

	public function init()
	{
		parent::init();

		$this->_id = Model_Bookmark_Table::F_ID;
		$this->_created = Model_Bookmark_Table::F_CREATED;
		$this->_modified = Model_Bookmark_Table::F_MODIFIED;
	}

	/**
	 * Returns the link reference (href).
	 *
	 * @return string
	 */
	public function getReference()
	{
		return $this->{Model_Bookmark_Table::F_REFERENCE};
	}

	/**
	 * Returns the link text.
	 *
	 * @return string
	 */
	public function getLinktext()
	{
		return $this->{Model_Bookmark_Table::F_LINKTEXT};
	}

	/**
	 * Set the the reference field to the given value.
	 *
	 * @param string $reference
	 * @return Model_Link
	 */
	public function setReference($reference)
	{
		$this->{Model_Bookmark_Table::F_REFERENCE} = $reference;
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
		$this->{Model_Bookmark_Table::F_LINKTEXT} = $linktext;
		return $this;
	}

	/**
	 * Returns the tags assigned to the bookmark.
	 *
	 * @param bool $asString
	 * @return Zend_Db_Table_Rowset | string
	 */
	public function getTags($asString = false)
	{
		return $tags = $this->findManyToManyRowset('Model_Tag_Table', 'Model_BookmarkTag_Table');
	}

	public function getTagsAsArray()
	{
		$tags = $this->getTags();

		$tagsArray = array();
		foreach ($tags as $tag) {
			$tagsArray[] = $tag->getName();
		}

		return $tagsArray;
	}

	public function getTagsAsString($separator = ',')
	{
		$separator .= ' ';
		$tagsArray = $this->getTagsAsArray();
		return implode($separator, $tagsArray);
	}

	public function __toString() {
		return $this->getReference();
	}
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

<?php

/**
 * Peer class for the bookmark model. This class represents
 * the database table itself.
 *
 * +-----------+------------------+------+-----+---------------------+----------------+
 * | Field     | Type             | Null | Key | Default             | Extra          |
 * +-----------+------------------+------+-----+---------------------+----------------+
 * | id        | int(10) unsigned | NO   | PRI | NULL                | auto_increment |
 * | created   | timestamp        | NO   |     | CURRENT_TIMESTAMP   |                |
 * | modified  | timestamp        | NO   |     | 0000-00-00 00:00:00 |                |
 * | reference | varchar(4096)    | NO   |     | NULL                |                |
 * | link      | varchar(255)     | NO   |     |                     |                |
 * +-----------+------------------+------+-----+---------------------+----------------+
 *
 * @category	Link-Fu
 * @package		Model
 * @subpackage	Bookmark
 * @version		1.0
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Model_Bookmark_Table extends Zend_Db_Table_Abstract
{
	const T_NAME = 'bookmark';

	const F_ID			= 'id';
	const F_CREATED		= 'created';
	const F_MODIFIED	= 'modified';
	const F_REFERENCE	= 'reference';
	const F_LINKTEXT	= 'link';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Bookmark';
	protected $_sequence	= true;

	protected $_dependentTables = array('Model_BookmarkTag_Table');

	protected static $instance = null;

	/**
	 * Returns an instance of the bookmark table.
	 *
	 * @param void
	 * @return Model_Bookmark_Table
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}// getInstance()

	/**
	 * Returns a bookmark specified by its datatbase id.
	 *
	 * @param int $id
	 * @return Model_Bookmark
	 *
	 * @throws InvalidArgumentException
	 */
	public function getById($id)
	{
		if (0 >= (int)$id) {
			throw new InvalidArgumentException('Invaid bookmark id: ' . $id);
		}

		$select = $this->select();
		$select->where(self::F_ID.'=?', $id);

		return $this->fetchRow($select);
	}// getById()

	/**
	 * Returns a row set of with all bookmarks stored
	 * in the database.
	 *
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	public function getAll()
	{
		$select = $this->select();
		return $this->fetchAll($select);
	}// getAll()

	/**
	 * Checks whether a bookmark, specified by its id, exists or not.
	 *
	 * @param int $id
	 * @return bool
	 *
	 * @throws InvalidArgumentException
	 */
	public static function exists($id)
	{
		if (0 >= (int)$id) {
			throw new InvalidArgumentException('Invaid bookmark id: ' . $id);
		}

		$adapter = $this->getAdapter();
		$sql = 'SELECT 1
				FROM '.self::T_NAME.'
				WHERE id='.$id;

		if (0 <= (int)$adapter->fetchOne($sql)) {
			return true;
		}

		return false;
	}// exists()

	/**
	 * Returns a row set of tags related to a given bookmark
	 *
	 * @param	int $bookmarkId
	 * @return	Zend_Db_Table_Rowset_Abstract
	 */
	public static function getTagsByBookmark($bookmarkId)
	{
		if (0 >= (int)$bookmarkId) {
			throw new InvalidArgumentException('Invalid bookmark id: ' . $bookmarkId);
		}

		$table = self::getInstance()->getById($bookmarkId);

		return $table->findManyToManyRowset(
			'Model_Tag_Table',
			'Model_BookmarkTag_Table'
		);
	}// getTagsByBookmark()
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

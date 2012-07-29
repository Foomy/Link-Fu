<?php

/**
 * Peer class for the tag model. This class represents
 * the database table itself.
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

class Model_Tag_Table extends Zend_Db_Table_Abstract
{
	const T_NAME = 'tag';

	const F_ID			= 'id';
	const F_CREATED		= 'created';
	const F_MODIFIED	= 'modified';
	const F_TAGNAME		= 'tagname';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Tag';
	protected $_sequence	= true;

	protected $_dependentTables = array('Model_BookmarkTag_Table');

	protected static $_instance = null;

	/**
	 * Returns an instance of the tag table.
	 *
	 * @param void
	 * @return Model_Tag_Table
	 */
	public static function getInstance()
	{
		if (null === self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}// getInstance()

	/**
	 * Returns a tag specified by its datatbase id.
	 *
	 * @param int $id
	 * @return Model_Tag
	 */
	public function findById($id)
	{
		$select = $this->select();
		$select->where(self::F_ID.'=?', $id);

		return $this->fetchRow($select);
	}// getById()

	/**
	 * Returns a row set with all tags stored in the database,
	 * grouped by the tag name. Also a counter how often the tag
	 * is in use is in the result set.
	 *
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	public function getAll()
	{
		$select = $this->select();
		return $this->fetchAll($select);
	}// getAll()

	/**
	 * Returns a array with all tags with their number of appearance.
	 *
	 * @return array
	 */
	public function getAllWithNumberOfAppearance()
	{
		$sql = "SELECT `id`, `tagname`, COUNT(tagname) AS `count`
				FROM `tag`
				LEFT JOIN `bookmark_tag` ON (`tag`.`id`=`bookmark_tag`.`tag_id`)
				GROUP BY `tagname`";

		return $this->getAdapter()->fetchAll($sql);
	}// getAllWithNumberOfAppearance
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

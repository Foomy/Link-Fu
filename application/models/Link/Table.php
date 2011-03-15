<?php

/**
 * Peer class for the link model. This class represents
 * the database table itself.
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

class Model_Link_Table extends Zend_Db_Table_Abstract
{
	const T_NAME = 'link';

	const F_ID			= 'id';
	const F_CREATED		= 'created';
	const F_MODIFIED	= 'modified';
	const F_REFERENCE	= 'reference';
	const F_LINKTEXT	= 'linktext';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Link';
	protected $_sequence	= true;

//	protected $_dependentTables = array('Model_Article_Peer');

	protected static $instance = null;

	/**
	 * Returns an instance of the link table.
	 *
	 * @param void
	 * @return Model_Link_Table
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}// getInstance()

	/**
	 * Returns a link specified by its datatbase id.
	 *
	 * @param int $id
	 * @return Model_Link
	 * 
	 * @throws InvalidArgumentException
	 */
	public static function getById($id)
	{
		if (0 >= (int)$id) {
			throw new InvalidArgumentException('Invaid database id: ' . $id);
		}
		
		$select = self::getInstance()->select();
		$select->where(self::F_ID.'=?', $id);
		
		return self::getInstance()->fetchRow($select);
	}// getById()

	/**
	 * Returns a row set of with all links stored
	 * in the database.
	 * 
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	public static function getAll()
	{
		$select = self::getInstance()->select();
		return self::getInstance()->fetchAll($select);
	}
	
	/**
	 * Checks whether a blog, specified by its id, exists or not.
	 *
	 * @param int $linkId
	 * @return bool
	 * 
	 * @throws InvalidArgumentException
	 */
	public static function exists($id)
	{
		if (0 >= (int)$id) {
			throw new InvalidArgumentException('Invaid database id: ' . $id);
		}
		
		$adapter = self::getInstance()->getAdapter();

		$sql = 'SELECT 1
				FROM '.self::T_NAME.'
				WHERE id='.$blogId;
		$res = $adapter->fetchOne($sql);

		if (0 <= (int)$res) {
			return(true);
		}
		
		return(false);
	}// exists()

}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

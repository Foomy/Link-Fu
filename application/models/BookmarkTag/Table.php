<?php

/**
 * Peer class for the bookmark-tag intersection table. This class represents
 * the database table itself.
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
 * @subpackage	BookmarkTag
 * @version		1.0
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Model_BookmarkTag_Table extends Zend_Db_Table_Abstract
{
	const T_NAME = 'bookmark_tag';

	const F_BOOKMARKID	= 'link_id';
	const F_TAGID	= 'tag_id';
	const F_CREATED	= 'created';

	protected $_name		= self::T_NAME;
	protected $_primary		= array(
		self::F_BOOKMARKID,
		self::F_TAGID
	);

	protected $_referenceMap = array(
		'Bookmark' => array(
			'columns'		=> array(self::F_BOOKMARKID),
			'refTableClass'	=> 'Model_Bookmark_Table',
			'refColums'		=> array(Model_Bookmark_Table::F_ID),
			'onDelete'		=> self::CASCADE,
			'onUpdate'		=> self::CASCADE
		),
		'Tag' => array(
			'columns'		=> array(self::F_TAGID),
			'refTableClass'	=> 'Model_Tag_Table',
			'refColumns'	=> array(Model_Tag_Table::F_ID),
			'onDelete'		=> self::CASCADE,
			'onUpdate'		=> self::CASCADE
		)
	);
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

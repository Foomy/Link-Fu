<?php

/**
 * Row class for the Bookmark model. An instance of this
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

class Model_BookmarkTag extends Zend_Db_Table_Row_Abstract
{
	protected $_primary = array(
		Model_BookmarkTag_Table::F_BOOKMARKID,
		Model_BookmarkTag_Table::F_TAGID
	);
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

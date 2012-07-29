<?php

/**
 * TagController
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	controller
 * @package		TagController
 */
class TagController extends LinkFu_Controller_Abstract
{
	private $_tagTable;

	public function init()
	{
		$this->_tagTable = Model_Tag_Table::getInstance();
	}

	public function tagNameAction()
	{
		if (! $this->_isAjax()) {
			$this->_redirect('/');
		}

		$returnData = array(
			'error' => false,
			'message' => '',
			'tagname' => ''
		);

		$tagId = (int)$this->_getParam('tagId', 0);
		if ($tagId <= 0) {
			$returnData['error'] = true;
			$returnData['message'] = 'Invalid Tag ID: ' . $tagId;
			$this->_helper->json($returnData);
		}

		if (null !== ($tag = $this->_tagTable->findById($tagId))) {
			$returnData['tagname'] = $tag->getName();
			$this->_helper->json($returnData);
		}
		else {
			$returnData['error'] = true;
			$returnData['message'] = "Fehler: Kein Schlagwort zu mit der ID »{$tagId}« gefunden.";
			$this->_helper->json($returnData);
		}
	}
}

<?php

/**
 * Controller class for the main page.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	controller
 * @package		IndexController
 */
class IndexController extends LinkFu_Controller_Abstract
{
	const IPP = 5;

	/**
	 * Instance of the link table.
	 *
	 * @var	Model_Bookmark_Table $_bookmarkTable
	 */
	private $_bookmarkTable;

	/**
	 * Instance of the tag table.
	 *
	 * @var	Model_Tag_Table $_tagTable
	 */
	private $_tagTable;

	/**
	 * (non-PHPdoc)
	 * @see	Zend_Controller_Action::init()
	 */
	public function init()
	{
		parent::init();

		$this->_bookmarkTable = Model_Bookmark_Table::getInstance();
		$this->_tagTable = Model_Tag_Table::getInstance();

		$this->view->headScript()->appendFile('/js/Linklist.js', self::MIME_JS);
		$this->view->headScript()->appendFile('/js/TagList.js', self::MIME_JS);
	}

	/**
	 * This controller action creates the form and gets the data
	 * for the link list from the model.
	 */
	public function indexAction()
	{
		$page		= (int)$this->_getParam('page', 1);
		$offset		= ($page-1) * self::IPP;
		$linkList	= $this->_bookmarkTable->getAll(self::IPP, $offset);

		$itemCount	= $this->_bookmarkTable->count();

		$paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Null($itemCount));
		$paginator->setCurrentPageNumber($page);
		$paginator->setItemCountPerPage(self::IPP);

		$features = Zend_Registry::get('features');
		$tagCloud = null;
		if (array_key_exists('taglist', $features) && $features['taglist'] === 'on') {
			$tagCloud = $this->_tagTable->getAllWithNumberOfAppearance();
		}

		$this->view->page		= $page;
		$this->view->linklist	= $linkList;
		$this->view->paginator	= $paginator;
		$this->view->tagCloud	= $tagCloud;
	}

	public function bookmarkFormAction()
	{
		if ($this->_isAjax()) {
			$this->_disableLayout();
		}

		$form = new Form_Link();
		if ($this->getRequest()->isPost() && $form->isValid($this->getRequest()->getPost())) {
			$values = $form->getValues();

			$link = $this->_bookmarkTable->createRow($values);
			$link->save();
		}

		$this->view->form = $form;
	}

	/**
	 * This controller action is called via ajax, it reads a
	 * certain link from the database identified by the given
	 * id.
	 */
	public function editAction()
	{
		if (! $this->_isAjax()) {
			$this->redirect('/');
		}

		$returnData = array(
			'error'		=> false,
			'message'	=> '',
			'exception'	=> null,
			'linkId'	=> 0,
			'reference'	=> '',
			'linktext'	=> ''
		);

		$linkId = (int)$this->_getParam('linkId', 0);
		if (null !==  ($link = $this->_bookmarkTable->findById($linkId))) {
			$returnData = array(
				'linkId' => $link->getId(),
				'reference' => $link->getReference(),
				'linktext' => $link->getLinktext()
			);
		} else {
			$message = sprintf('Bookmark with id %d not found in database.', $linkId);
			$returnData['error'] = true;
			$returnData['message'] = $message;
			$this->_debug($message);
		}

		$this->_helper->json($returnData);
	}

	/**
	 * Saves an edited link in the database.
	 *
	 * @todo	Unfortunally the linktext wont be saved. :(
	 */
	public function updateAction()
	{
		$form = new Form_Link();

		$linkId = (int)$this->_getParam('linkId', 0);
		if (null !==  ($link = $this->_bookmarkTable->findById($linkId))) {
			$link->setLinktext($this->_getParam('linktext'));
			$link->setReference($this->_getParam('reference'));
			$link->save();
		}

		$this->redirect('/');
	}

	/**
	 * This controller action is called via ajax, and delete the
	 * given link from the database.
	 */
	public function deleteAction()
	{
		if (! $this->isAjax()) {
			$this->redirect('/');
		}

		$response = array(
			'error'		=> false,
			'message'	=> '',
			'exception'	=> null,
			'linkId'	=> 0
		);

		$linkId = (int)$this->_getParam('linkId', 0);
		$response['linkId'] = $linkId;
		$link = $this->_bookmarkTable->findById($linkId);

		$link->delete();

		$this->_helper->json($response);
	}
}

/**
 * "Let me know if there's some other way we can screw up tonight."
 * (James T. Kirk, Star Trek VI - The Undiscovered Country)
 */

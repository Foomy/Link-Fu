<?php

// require_once APPLICATION_PATH . '/../library/LinkFu/Controller/Abstract.php';

/**
 * Controller class for the main page.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de1>
 *
 * @category	controller
 * @package		IndexController
 */
class IndexController extends LinkFu_Controller_Abstract
{
	const IPP = 7;

	/**
	 * Instance of the link table.
	 *
	 * @var Zend_Db_Table_Abstract $linkTable
	 */
	private $_bookmarkTable;

	/**
	 * Instance of the tag table.
	 *
	 * @var unknown_type
	 */
	private $_tagTable;

	/**
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
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
	 * for the linklist from the model.
	 */
	public function indexAction()
	{
		$form = new Form_Link();
		$form->setAction('/');

		$request = $this->getRequest();

		if ($request->isPost() && $form->isValid($request->getPost())) {
			$values = $form->getValues();

			$link = $this->_bookmarkTable->createRow($values);
			$link->save();
			$this->_redirect('/');
		}


		$this->view->taglist	= $this->_tagTable->getAllWithNumberOfAppearance();
		$this->view->form		= $form;
		$this->view->page		= $this->getParam('page', 1);
	}

	/**
	 * This controller action is called via ajax, and delete the
	 * given link from the database.
	 */
	public function deleteAction()
	{
		if ($this->isAjax()) {
			$this->_redirect('/');
		}

		$returnData = array(
			'error'		=> false,
			'message'	=> '',
			'exception'	=> null,
			'linkId'	=> 0
		);

		try {
			$linkId = (int)$this->getParam('linkId', 0);
			$returnData['linkId'] = $linkId;
			$link = $this->_bookmarkTable->getById($linkId);

			if ($link instanceof Zend_Db_Table_Row_Abstract) {
				$link->delete();
			} else {
				$message = sprintf('Bookmark with id %d not found in database.', $linkId);

				$returnData['message']	= message;
				$returnData['error']	= true;

				$this->debug($message);
			}
		} catch (Exception $e) {
			$returnData['error'] = true;
			$returnData['message'] = 'An exception has occurred.';
			$returnData['exception'] = $e;
			$this->debug($e->getMessage());
		}

		$this->_helper->json($returnData);
	}

	/**
	 * This controller action is called via ajax, it reads a
	 * certain link from the database identified by the given
	 * id.
	 */
	public function editAction()
	{
		if (! $this->isAjax()) {
			$this->_redirect('/');
		}

		$returnData = array(
			'error'		=> false,
			'message'	=> '',
			'exception'	=> null,
			'linkId'	=> 0,
			'reference'	=> '',
			'linktext'	=> ''
		);

		try {
			$linkId = (int)$this->getParam('linkId', 0);
			$link = $this->_bookmarkTable->getById($linkId);
			if ($link instanceof Zend_Db_Table_Row_Abstract) {
				$returnData = array(
					'linkId' => $link->getId(),
					'reference' => $link->getReference(),
					'linktext' => $link->getLinktext()
				);
			} else {
				$message = sprintf('Bookmark with id %d not found in database.', $linkId);
				$returnData['error'] = true;
				$returnData['message'] = $message;
				$this->debug($message);
			}
		} catch (Exception $e) {
			$returnData['error'] = true;
			$returnData['message'] = $e->getMessage();
			$returnData['excpetion'] = $e;
			$this->debug($e->getMessage());
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
		$linkId = (int)$this->getParam('linkId', 0);

		try {
			$link = $this->_bookmarkTable->getById($linkId);
			if ($link instanceof Zend_Db_Table_Row_Abstract) {
				$link->setLinktext($this->getParam('linktext'));
				$link->setReference($this->getParam('reference'));
				$link->save();
			}
		} catch (Exception $e) {
			$this->debug($e->getMessage());
		}

		$this->_redirect('/');
	}

	/**
	 * Show the linklist
	 */
	public function linklistAction()
	{
		if ($this->isAjax()) {
			$this->getHelper('viewRenderer')->setNoRender();
			$this->getHelper('layout')->disableLayout();
		}

		$page		= $this->getParam('page', 1);
		$offset		= ($page-1) * self::IPP;
		$linkList	= $this->_bookmarkTable->getAll(self::IPP, $offset);

		$itemCount	= $this->_bookmarkTable->count();
		$pageCount	= ceil($itemCount / self::IPP);

		$paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Null($itemCount));
		$paginator->setCurrentPageNumber($page);
		$paginator->setItemCountPerPage(self::IPP);

		$this->view->linklist	= $linkList;
		$this->view->paginator	= $paginator;
	}
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

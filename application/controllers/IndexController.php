<?php

/**
 * Controller class for the main page.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de1>
 *
 * @category	Link-Fu
 * @package		IndexController
 *
 * @todo Extend from Foo_Controller_Abstract
 */
class IndexController extends Zend_Controller_Action
{
	/**
	 * Flag turns debug messages on or off.
	 *
	 * @var bool DEBUG
	 */
	const DEBUG = false;

	/**
	 * Ajax error.
	 *
	 * @var bool $ajaxError
	 */
	private $ajaxError = false;

	/**
	 * Instance of the logger.
	 *
	 * @var Zend_Log $logger
	 * @todo Export to Foo_Controller_Abstract
	 */
	private $logger;
	
	/**
	 * Instance of the link table.
	 * 
	 * @var Zend_Db_Table_Abstract $linkTable
	 */
	private $bookmarkTable;
	
	/**
	 * Instance of the tag table.
	 * 
	 * @var unknown_type
	 */
	private $tagTable;
	
	/**
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init()
	{
		$bootstrap = $this->getInvokeArg('bootstrap');
		$this->logger = $bootstrap->getResource('log');
		$this->bookmarkTable = Model_Bookmark_Table::getInstance();
		$this->tagTable = Model_Tag_Table::getInstance();

		$this->view->headScript()->appendFile(
			'/js/Linklist.js',
			'text/javascript'
		);

		$this->view->headScript()->appendFile(
			'/js/TagList.js',
			'text/javascript'
		);
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

			if (self::DEBUG) {
				Zend_Debug::dump($values);
			}

			$link = $this->bookmarkTable->createRow($values);
			$link->save();
			$this->_redirect('/');
		}

		$curPage		= (int)$request->getParam('curPage', 1);
		$itemsPerPage	= (int)$request->getParam('ipp', 7);

		$offset			= ($curPage-1) * $itemsPerPage;
		$linkList		= $this->bookmarkTable->getAll($itemsPerPage, $offset);

		$itemCount		= $this->bookmarkTable->count();
		$pageCount		= ceil($itemCount / $itemsPerPage);

		$paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Null($itemCount));
		$paginator->setCurrentPageNumber($curPage);
		$paginator->setItemCountPerPage($itemsPerPage);

		$this->view->taglist	= $this->tagTable->getAllWithNumberOfAppearance();
		$this->view->linklist	= $linkList;
		$this->view->form		= $form;
		$this->view->pageCount	= $pageCount;
		$this->view->curPage	= $curPage;
		$this->view->paginator	= $paginator;
	}

	/**
	 * This controller action is called via ajax, and delete the
	 * given link from the database.
	 *
 	 * @todo Use JSON-Helper instead of setAjaxBehavior()
	 */
	public function deleteAction()
	{
		if ($this->getRequest()->isXmlHttpRequest()) {
			$this->setAjaxBehavior();
			$returnData = array(
				'error' => false
			);

			try {
				$linkId = (int)$this->getRequest()->getParam('linkId', 0);
				$returnData['linkId'] = $linkId;
				$link = $this->bookmarkTable->getById($linkId);
				if ($link instanceof Zend_Db_Table_Row_Abstract) {
					$link->delete();
				} else {
					$returnData['error'] = true;
					$this->logger->log(sprintf('Bookmark with id %d not found in database.', $linkId), Zend_Log::ERR);
				}
			} catch (Exception $e) {
				$returnData['error'] = true;
				$this->logger->log($e->getMessage(), Zend_Log::ERR);
			}

			echo json_encode($returnData);
		} else {
			$this->_redirect('/');
		}
	}

	/**
	 * This controller action is called via ajax, it reads a
	 * certain link from the database identified by the given
	 * id.
	 */
	public function editAction()
	{
		if ($this->getRequest()->isXmlHttpRequest()) {
			$this->setAjaxBehavior();
			$returnData = array(
				'error' => true
			);

			try {
				$linkId = (int)$this->getRequest()->getParam('linkId', 0);
				$link = $this->bookmarkTable->getById($linkId);
				if ($link instanceof Zend_Db_Table_Row_Abstract) {
					$returnData = array(
						'error' => false,
						'id' => $link->getId(),
						'reference' => $link->getReference(),
						'linktext' => $link->getLinktext()
					);
				} else {
					$this->logger->log(sprintf('Bookmark with id %d not found in database.', $linkId), Zend_Log::ERR);
				}
			} catch (Exception $e) {
				$returnData['excpetion'] = $e->getMessage();
				$this->logger->log($e->getMessage(), Zend_Log::ERR);
			}

			echo json_encode($returnData);
		} else {
			$this->_redirect('/');
		}
	}

	/**
	 * Saves an edited link in the database.
	 */
	public function updateAction()
	{
		$request = $this->getRequest();
		$linkId = (int)$request->getParam('linkId', 0);

		try {
			$link = $this->bookmarkTable->getById($linkId);
			if ($link instanceof Zend_Db_Table_Row_Abstract) {
				$link->setLinktext($request->getParam('linktext'));
				$link->setReference($request->getParam('reference'));
				$link->save();
			}
		} catch (Exception $e) {
			$this->logger->log($e->getMessage(), Zend_Log::ERR);
		}

		$this->_redirect('/');
	}

	/**
	 * Disables rendering of the view and the layout.
	 */
	private function setAjaxBehavior()
	{
		$this->getHelper('viewRenderer')->setNoRender();
		$this->getHelper('layout')->disableLayout();
	}
}

/**
 *  "Wenn wir heute noch was vermasseln koennen, sagt mir bescheid!"
 *  (James T. Kirk, Star Trek VI - Das unendeckte Land)
 */

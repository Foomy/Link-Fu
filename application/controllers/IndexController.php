<?php

/**
 * Controller class for the main page.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de1>
 *
 * @category	Link-Fu
 * @package		Controller
 * @subpackage	Index
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
	 */
	private $logger;

	/**
	 * (non-PHPdoc)
	 * @see Zend_Controller_Action::init()
	 */
	public function init()
	{
		$bootstrap = $this->getInvokeArg('bootstrap');
		$this->logger = $bootstrap->getResource('log');

		$this->view->headScript()->appendFile(
			'/js/Linklist.js',
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
		$linkTable = $this->getLinkTableInstance();

		if ($request->isPost() && $form->isValid($request->getPost())) {
			$values = $form->getValues();

			if (self::DEBUG) {
				Zend_Debug::dump($values);
			}

			$link = $linkTable->createRow($values);
			$link->save();
		}

		$this->view->taglist	= $this->getTagTableInstance()->getAllWithNumberOfAppearance();
		$this->view->linklist	= $linkTable->getAll();
		$this->view->form		= $form;
	}

	/**
	 * This controller action is called via ajax, and delete the
	 * given link from the database.
	 */
	public function deleteAction()
	{
		if ($this->getRequest()->isXmlHttpRequest()) {
			$this->setAjaxBehavior();
			$error = false;

			try {
				$id = (int)$this->getRequest()->getParam('linkId', 0);
				if (($link = $this->getLinkTableInstance()->getById($id)) !== null) {
					$link->delete();
				} else {
					throw new InvalidArgumentException('Invalid link id: ' . $id);
				}
			} catch (Exception $e) {
				$error = true;
				$this->logger->log($e->getMessage(), Zend_Log::ERR);
			}

			echo json_encode(array(
				'error' => $error,
				'linkId' => $id
			));
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
			$data = array(
				'error' => true
			);

			try {
				$id = (int)$this->getRequest()->getParam('linkId', 0);
				if (($link = $this->getLinkTableInstance()->getById($id)) !== null) {
					$data = array(
						'error' => false,
						'id' => $link->getId(),
						'reference' => $link->getReference(),
						'linktext' => $link->getLinktext()
					);
				} else {
					throw new InvalidArgumentException('Invalid link id: ' . $id);
				}
			} catch (Exception $e) {
				$data['excpetion'] = $e->getMessage();
				$this->logger->log($e->getMessage(), Zend_Log::ERR);
			}

			echo json_encode($data);
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
		$id = (int)$request->getParam('linkId', 0);

		try {
			if (($link = $this->getLinkTableInstance()->getById($id)) !== null) {

				$link->setLinktext($request->getParam('linktext'));
				$link->setReference($request->getParam('reference'));
				$link->save();
			}
		} catch (InvalidArgumentException $e) {
			$this->logger->log($e->getMessage(), Zend_Log::ERR);
		}

		$this->_redirect('/');
	}

	/**
	 * Returns an instance of the link table class.
	 */
	protected function getLinkTableInstance() {
		return Model_Bookmark_Table::getInstance();
	}

	/**
	 * Returns an instance of the tag table class.
	 */
	protected function getTagTableInstance() {
		return Model_Tag_Table::getInstance();
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

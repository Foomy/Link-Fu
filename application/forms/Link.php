<?php

/**
 * Definition class for the link form.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	Link-Fu
 * @package		Form
 * @subpackage	Link
 */

class Form_Link extends Zend_Form
{
	public function init()
	{
		$this->addAttribs(array(
			'id' => 'linkform',
			'class' => 'is_linkform'
		));
		$this->addElement($this->getIdElement());
		$this->addElement($this->getReferenceElement());
		$this->addElement($this->getLinktextElement());
		$this->addElement($this->getTagsElement());
//		$this->addElement($this->getFillTagFieldButton());
		$this->addElement($this->getSubmit());
	}

	private function getIdElement()
	{
		$element = new Zend_Form_Element_Hidden('linkId');
		$element->setAttrib('class', 'is_linkid');
//		$element->clearDecorators();
//		$element->addDecorators(array('viewHelper'));
		return $element;
	}

	private function getReferenceElement()
	{
		$element = new Zend_Form_Element_Text(Model_Bookmark_Table::F_REFERENCE);
		$element->setRequired(true)
				->setLabel('Href:')
				->addFilter(new Zend_Filter_StripTags())
				->addFilter(new Zend_Filter_StringTrim())
				->addValidator(new Zend_Validate_NotEmpty())
				->setAttrib('class', 'is_linkref');
		return $element;
	}

	private function getLinktextElement()
	{
		$element = new Zend_Form_Element_Text(Model_Bookmark_Table::F_LINKTEXT);
		$element->setLabel('Linktext: ')
				->addFilter(new Zend_Filter_StripTags())
				->addFilter(new Zend_Filter_StringTrim())
				->setAttrib('class', 'is_linktext');
		return $element;
	}

	private function getTagsElement()
	{
		$element = new Zend_Form_Element_Text('tags');
		$element->setLabel('Tags: ')
				->addFilter(new Zend_Filter_StripTags())
				->addFilter(new Zend_Filter_StringTrim())
				->setAttrib('class', 'is_linktags');
		return $element;
	}

	private function getFillTagFieldButton()
	{
		$element = new Zend_Form_Element_Button('addTag');
		$element->clearDecorators()
				->addDecorators(array(
					'ViewHelper',
					array('HtmlTag',
						array(
							'tag' => 'img',
							'src' => '/img/icons/add.png',
							'alt' => 'add',
							'title' => 'Tag hinzufügen'
						)
					),
				));

		return $element;
	}

	private function getSubmit()
	{
		$element = new Zend_Form_Element_Submit('speichern');
		$element->setLabel('Speichern');
		return $element;
	}
}

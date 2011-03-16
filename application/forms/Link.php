<?php

/**
 * Definition class for the link form.
 *
 * @category	Link-Fu
 * @package		Form
 * @subpackage	Link
 * @version		1.1
 * @author		Sascha Schneider <foomy.code@arcor.de>
 */

class Form_Link extends Zend_Form
{
	public function init()
	{
		$this->addAttribs(array(
			'id' => 'linkform'
		));
		$this->addElement($this->getIdElement());
		$this->addElement($this->getReferenceElement());
		$this->addElement($this->getLinktextElement());
		$this->addElement($this->getSubmit());
	}

	private function getIdElement()
	{
		$element = new Zend_Form_Element_Hidden('linkId');
//		$element->clearDecorators();
//		$element->addDecorators(array('viewHelper'));
		return $element;
	}

	private function getReferenceElement()
	{
		$element = new Zend_Form_Element_Text(Model_Link_Table::F_REFERENCE);
		$element->setRequired(true)
				->setLabel('Href:')
				->addFilter(new Zend_Filter_StripTags())
				->addFilter(new Zend_Filter_StringTrim())
				->addValidator(new Zend_Validate_NotEmpty());
		return $element;
	}

	private function getLinktextElement()
	{
		$element = new Zend_Form_Element_Text(Model_Link_Table::F_LINKTEXT);
		$element->setLabel('Linktext: ')
				->addFilter(new Zend_Filter_StripTags())
				->addFilter(new Zend_Filter_StringTrim());
		return $element;
	}

	private function getSubmit()
	{
		$element = new Zend_Form_Element_Submit('speichern');
		$element->setLabel('Speichern');
		return $element;
	}
}
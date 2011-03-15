<?php

require_once 'Zend/View/Helper/Abstract.php';

/**
 * Load
 * 
 * @author      Sascha Schneider <sascha.schneider@vonaffenfels.de>
 * 
 * @category    
 * @package     
 * @subpackage
 */
class Zend_View_Helper_LoadSkin extends Zend_View_Helper_Abstract
{
    public function loadSkin($skin)
    {
        // Load the skin config file
        $skinData = new Zend_Config_Xml('./skins/' . $skin . '/skin.xml');
        $stylesheets = $skinData->stylesheets->stylesheet->toArray();

        // Append each stylesheet
        if (is_array($stylesheets)) {
            foreach ($stylesheets as $stylesheet) {
                $this->view->headLink()->appendStylesheet('/skins/' . $skin . '/css/' . $stylesheet) . PHP_EOL;
            }
        }
    }
}

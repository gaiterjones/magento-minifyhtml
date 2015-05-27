<?php
/**
 * PAJ - MINIFY HTML
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the The MIT License (MIT)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://blog.gaiterjones.com/dropdev/magento/LICENSE.txt
 *
 * @category    PAJ
 * @package     PAJ_MinifyHTML
 * @copyright   Copyright (c) 2015 PAJ
 * @license     http://blog.gaiterjones.com/dropdev/magento/LICENSE.txt  The MIT License (MIT)
 */

class PAJ_MinifyHTML_Model_Observer
{
	
    public function alterOutput($observer)
    {
        //Retrieve html body
        $response = $observer->getResponse();       
        $html     = $response->getBody();

		//Mage::log('PAJ_MinifyHTML_Model_Observer::observer');
		//$html=$this->sanitize(PAJ_MinifyHTML_Model_Minify::minify($html,array('jsCleanComments' => true)));
		
		if (Mage::helper('minifyhtml/data')->isActive())
		{	
			$html=PAJ_MinifyHTML_Model_Minify::minify($html,array('jsCleanComments' => true));
		}
		
        //Send Response
        $response->setBody($html);
    }
	
	
	// sanitize
	// attempts to remove all newlines
	// can screw up js
	protected function sanitize($_html) {
	   
		return (preg_replace('#\R+#', ' ', $_html));
	}	
}
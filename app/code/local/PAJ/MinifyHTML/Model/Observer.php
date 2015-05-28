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
	protected $_timerstart=false;
	
    public function alterOutput($observer)
    {
		//if (file_exists(Mage::getModuleDir('etc', 'Lesti_Fpc'))) {return;}
		//if (Mage::helper('core')->isModuleEnabled('Lesti_Fpc')) {return;}
		//Mage::log('PAJ_MinifyHTML_Model_Observer::observer '. time());
		
		
		// retrieve html body
		$response = $observer->getResponse();       
		$html     = $response->getBody();
		
		// do not minify json
		if(substr($html, 0, 1) === '{') { return; }
		
		if (Mage::helper('minifyhtml/data')->isActive())
		{	
			$this->timer();
			$_timeStamp='';
			
		
			// minify
			$html=PAJ_MinifyHTML_Model_Minify::minify($html,array('jsCleanComments' => true));
			$_timeStamp="\n".'<!-- +MIN '. date("d-m-Y H:i:s"). ' '. $this->timer(false). ' -->';
			// send Response
			$response->setBody($html.$_timeStamp);			
		}
    }
	
	protected function sanitize($_html) {
	   
		return (preg_replace('#\R+#', ' ', $_html));
	}

	protected function timer($_start=true)
	{
		if ($_start)
		{
			// start
			$time = microtime();
			$time = explode(' ', $time);
			$time = $time[1] + $time[0];
			$this->_timerstart=$time;
			
		} else {
			// stop
			$time = microtime();
			$time = explode(' ', $time);
			$time = $time[1] + $time[0];
			$finish = $time;
			$total_time = round(($finish - $this->_timerstart), 4);
			return ($total_time);
		}
	
	}	
}
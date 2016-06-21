<?php
 /** 
 * Extension for Contao Open Source CMS
 *
 * Copyright (C) 2016 Monique Hahnefeld
 *
 * @package codeowl_fw_foundation
 * @author  Monique Hahnefeld <mhahnefeld@designs2.de>
 * @link    http://designs2.de
 * @license LGPLv3
 *
 * `-,-´
 *	 ( )  codeowl set
 *************************/

namespace Codeowl;

use Codeowl\OutputGridVars as OutputGridVars;

class ContentVCard extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_vcard';


	// `-,-´ Generate the content element
	protected function compile()
	{
		
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}
		
		global $objPage;

		$items = unserialize($this->vcard);
		if (!is_array($items)) {
			return;
		}
		$nl2br = ($objPage->outputFormat == 'xhtml') ? 'nl2br_xhtml' : 'nl2br_html5';

		$this->Template->id = 'vcard_' . $this->id;
	
		foreach ($items as  $val) {
			if ($val['class']=='email') {
				$this->Template->email = $this->convert($val['content']);
			}
		}
		 
		$this->Template->items = $items;

		// `-,-´ css and attributes
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;
	
	}
	public function convert($email) {
	    $p = str_split(trim($email));
	    $new_mail = '';
	    foreach ($p as $val) {
	        $new_mail .= '&#'.ord($val).';';
	    }
	    return $new_mail;
	}
}

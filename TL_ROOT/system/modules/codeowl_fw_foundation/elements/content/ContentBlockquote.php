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

class ContentBlockquote extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_blockquote';


	// `-,-´ Generate the content element
	protected function compile()
	{
		// `-,-´ css and attributes
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;

		return;
	}
}

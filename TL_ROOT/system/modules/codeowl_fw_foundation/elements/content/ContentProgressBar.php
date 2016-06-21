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

use Codeowl\OutputPresets as OutputPresets;
use Codeowl\OutputGridVars as OutputGridVars;

class ContentProgressBar extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_progress_bar';


	// `-,-´ Generate the content element
	protected function compile()
	{
		
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}

		// `-,-´ css and attributes
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$Output 						= new OutputPresets;
		$this->Template->ftc_classes 	= $objEl->co_fw_ftc_classes;
		$this->Template->btn_styles 	= $Output->splitArr($this->co_fw_btn_styles);
		// $this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;

		$this->Template->ftcID          = ' id="progressbar_' . $this->id.'" ';
	
	
	}
	
}

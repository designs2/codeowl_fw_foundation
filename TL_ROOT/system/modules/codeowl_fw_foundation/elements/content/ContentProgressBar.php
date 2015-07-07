<?php
/** 
 * Extension for Contao Open Source CMS
 *
 * Copyright (C) 2015 Monique Hahnefeld
 *
 * @package codeowl_fw_foundation
 * @author  Monique Hahnefeld <info@monique-hahnefeld.de>
 * @link    http://codeowl.org
 * @license LGPLv3
 *
 * `-,-´
 *	( )  codeowl.org
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
		$cssFormation 					= new OutputGridVars;
		$objEl 							= $cssFormation->design_elements($this);
		$Output 						= new OutputPresets;
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->btn_styles 	= $Output->splitArr($this->btn_styles);
		// $this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;

		$this->Template->ftcID          = ' id="progressbar_' . $this->id.'" ';
	
	
	}
	
}

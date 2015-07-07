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

use Codeowl\OutputGridVars as OutputGridVars;

class ContentTabStartInsideFTC extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_tab_start_inside';

	// `-,-´ Generate the content element
	protected function compile()
	{	

		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}
		$this->Template->hl = $this->hl;
		$this->Template->headline = $this->headline;
		$this->Template->anchor ='';
		if($this->cssID!==''){
		$cssArr = (is_array($this->cssID))?$this->cssID:deserialize($this->cssID,true);

		$this->Template->anchor = $cssArr[0]; //raw cssID
		}

		// `-,-´ css and attributes
		$cssFormation 					= new OutputGridVars;
		$objEl 							= $cssFormation->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;
		$this->Template->tabs_align     = $this->tabs_align;
		

	}
}

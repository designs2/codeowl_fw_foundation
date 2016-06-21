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
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;
		$this->Template->tabs_align     = $this->tabs_align;
		

	}
}

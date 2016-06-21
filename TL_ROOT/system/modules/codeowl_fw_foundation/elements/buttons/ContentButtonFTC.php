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

class ContentButtonFTC extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_button_ftc';

	// `-,-´ Generate the content element
	protected function compile()
	{
	
			if (TL_MODE == 'BE')
			{
				$this->strTemplate = 'be_wildcard';
				$this->Template = new \BackendTemplate($this->strTemplate);
				$this->Template->title = $this->headline;
			}
			$this->Template->id = 'btn_' . $this->id;
			if ($this->use_reveal) {
			$this->Template->btn_attr = 'data-reveal-id="' . $this->modal_id . '"';	
			}
			$Output = new OutputPresets;
			$this->Template->btn_classes = $this->btn_size. '' . $Output->splitArr($this->btn_styles);

			// `-,-´ css and attributes
			$cssFormation 					= new OutputGridVars;
			$objEl 							= $cssFormation->design_elements($this);
			$this->Template->ftc_classes 	= $objEl->ftc_classes;
			$this->Template->ftcID 			= $objEl->ftcID;
			$this->Template->data_attr 		= $objEl->data_attr;
			$this->Template->class 			= $objEl->ftc_classes;
			$this->Template->cssID 			= $objEl->ftcID;
	
	}

}

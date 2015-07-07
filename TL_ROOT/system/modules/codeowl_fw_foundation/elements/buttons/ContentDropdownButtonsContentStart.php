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

class ContentDropdownButtonsContentStart extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_dropdown_buttons_content_start';


	// `-,-´ Generate the content element
	protected function compile()
	{
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->btn_name;
		}

		// `-,-´ css and attributes
		$cssFormation 					= new OutputGridVars;
		$objEl 							= $cssFormation->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;
		
		if ($this->btn_hover) {
			$hover='is_hover:true;';
		}else {
			$hover='';
		}
		// `-,-´ down is default
		if ($this->drop_align!=='down'&&$this->drop_align!==' '&&$this->drop_align!=='') {
			$drop_align='align:'.$this->drop_align;
		}else {
			$drop_align='';
		}
		$this->Template->dropdown_opt = $hover. '' .$drop_align;
		
		$this->Template->id = 'dropdown_cont' . $this->id;
		$Output = new OutputPresets;
		$this->Template->btn_classes = $this->btn_size. '' . $Output->splitArr($this->btn_styles);
	
		$this->Template->items = $items;
		unset($this);
	}

}

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

class ContentDropdownButtons extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_dropdown_buttons';


	// `-,-´ Generate the content element
	protected function compile()
	{
		global $objPage;

		$items = unserialize($this->list_links);
		$nl2br = ($objPage->outputFormat == 'xhtml') ? 'nl2br_xhtml' : 'nl2br_html5';

		$this->Template->id = 'dropdown' . $this->id;
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
		$Output = new OutputPresets;
		$this->Template->btn_classes = $this->btn_size. '' . $Output->splitArr($this->btn_styles);
	
		$this->Template->items = $items;

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

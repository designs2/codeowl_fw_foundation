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

class ContentButtonGroup extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_button_group';


	// `-,-´ Generate the content element
	protected function compile()
	{
		global $objPage;

		$items = unserialize($this->list_links);
		$nl2br = ($objPage->outputFormat == 'xhtml') ? 'nl2br_xhtml' : 'nl2br_html5';

		$this->Template->id = 'btn_group' . $this->id;
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

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

class ContentMagellanStop extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_magellan_stop';

	// `-,-´ Generate the content element
	protected function compile()
	{	
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = $this->headline;
		}

		$this->Template->hl 		= $this->hl;
		$this->Template->tabs_align = $this->tabs_align;
		$this->Template->headline 	= $this->headline;
		$this->Template->anchor     = trim($this->cssID[0]);
	}
}

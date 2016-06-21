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
		$this->Template->tabs_align = $this->co_fw_tabs_align;
		$this->Template->headline 	= $this->headline;
		$this->Template->anchor     = trim($this->cssID[0]);
	}
}

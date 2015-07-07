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

class ContentPlaceholderImage extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_placeholder_image';


	// `-,-´ Return if the image does not exist
	public function generate()
	{
		$sizeStr = unserialize($this->size);
		$imagemargin = unserialize($this->imagemargin);
		$this->arrSize = $sizeStr;
		$this->href = ($this->imageUrl!=='') ? $this->imageUrl: false;
		$this->margin = 'margin:'.$imagemargin['top'].$imagemargin['unit'].' '.$imagemargin['right'].$imagemargin['unit'].' '.$imagemargin['bottom'].$imagemargin['unit'].' '.$imagemargin['left'].$imagemargin['unit'].'; ';
		
		$is_bw = ($this->is_bw) ? 'g/' : '' ;
		$this->singleSRC ='http://lorempixel.com/'.$is_bw.''.$sizeStr[0].'/'.$sizeStr[1].'/'.$this->topic.'/'.$this->stamp.'/'; //$objFile->path;
		return parent::generate();
	}

	// `-,-´ Generate the content element
	protected function compile()
	{
		// `-,-´ css and attributes
		$cssFormation 					= new OutputGridVars;
		$objEl 							= $cssFormation->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;

		//$this->addImageToTemplate($this->Template, $this->arrData);
	}
}

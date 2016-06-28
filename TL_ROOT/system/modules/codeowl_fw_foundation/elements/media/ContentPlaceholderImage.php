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
		
		$is_bw = ($this->co_fw_is_bw) ? 'g/' : '' ;
		$this->singleSRC ='http://lorempixel.com/'.$is_bw.''.$sizeStr[0].'/'.$sizeStr[1].'/'.$this->co_fw_topic.'/'.$this->co_fw_stamp.'/'; //$objFile->path;
		return parent::generate();
	}

	// `-,-´ Generate the content element
	protected function compile()
	{
		// `-,-´ css and attributes
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;

		//$this->addImageToTemplate($this->Template, $this->arrData);
	}
}

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

class FormRangeSlider extends \Widget
{

	// `-,-´ Submit user input
	protected $blnSubmitInput = true;

	// `-,-´ Template
	protected $strTemplate = 'form_range_slider';

	// `-,-´ Error message
	protected $strError = '';

	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'maxlength':
				if ($varValue > 0)
				{
					$this->arrAttributes['maxlength'] =  $varValue;
				}
				break;

			case 'mandatory':
				if ($varValue)
				{
					$this->arrAttributes['required'] = 'required';
				}
				else
				{
					unset($this->arrAttributes['required']);
				}
				parent::__set($strKey, $varValue);
				break;

			case 'placeholder':
				$this->arrAttributes['placeholder'] = $varValue;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	// `-,-´ Trim the values
	protected function validator($varInput)
	{
		if (is_array($varInput))
		{
			return parent::validator($varInput);
		}

		return parent::validator(trim($varInput));
	}


	// `-,-´ Parse the template file and return it as string
	public function parse($arrAttributes=null)
	{
			
		// `-,-´ css and attributes
		// $cssFormation 					= new OutputGridVars;
		// $objEl 							= $cssFormation->design_elements($this);
		// $this->Template->ftc_classes 	= $objEl->ftc_classes;
		// $this->Template->ftcID 			= $objEl->ftcID;
		// $this->Template->data_attr 		= $objEl->data_attr;
		// $this->Template->class 			= $objEl->ftc_classes;
		// $this->Template->cssID 			= $objEl->ftcID;

		$Output 						= new OutputPresets;
		$this->rs_id 					= 'range_value_'.$this->id;
        $this->ftc_rs_classes 			= $Output->splitArr($this->rs_classes);
        $this->type 					= 'hidden';
	
		return parent::parse($arrAttributes);
	}


	// `-,-´ Generate the widget and return it as string
	// `-,-´ @deprecated The logic has been moved into the template (see #6834)
	public function generate()
	{
		return sprintf('<input type="%s" name="%s" id="ctrl_%s" class="text%s%s" value="%s"%s%s',
						$this->type,
						$this->strName,
						$this->strId,
						($this->hideInput ? ' password' : ''),
						(($this->strClass != '') ? ' ' . $this->strClass : ''),
						specialchars($this->varValue),
						$this->getAttributes(),
						$this->strTagEnding) . $this->addSubmit();
	}

}

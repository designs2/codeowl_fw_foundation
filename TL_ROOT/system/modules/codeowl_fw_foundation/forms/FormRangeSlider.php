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
		
		$Output 						= new OutputPresets;
		$this->rs_id 					= 'range_value_'.$this->id;
        $this->ftc_rs_classes 			= $Output->splitArr($this->co_fw_rs_classes);
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

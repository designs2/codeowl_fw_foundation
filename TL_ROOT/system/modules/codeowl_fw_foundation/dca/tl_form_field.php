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

$fieldsSize 	= count($GLOBALS['TL_DCA']['tl_form_field']['fields'])-1;
$palettesSize 	= count($palettes)-1;
$default 		= '{type_legend},type;';
$expert 		= '{template_legend:hide},customTpl;{expert_legend:hide},class;';


$GLOBALS['TL_DCA']['tl_form_field']['palettes']['range_slider'] = $default.'{slider_legend},co_fw_rs_classes,co_fw_rs_start,co_fw_rs_end,co_fw_rs_step,co_fw_rs_show_value,co_fw_rs_unity;{template_legend:hide},customTpl';


array_insert($GLOBALS['TL_DCA']['tl_form_field']['fields'], $fieldsSize, array
(
			
		   	// `-,-´ range slider
		   	'co_fw_rs_classes' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_classes'],
		   				'default'                 => ' ',
		   				'options'=>array(' ','radius','round'),
		   				'inputType'               => 'select',
		   				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_classes_options'],
		   				'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   				'sql'                     => "varchar(32) NOT NULL default ''"
		   			),
		   	// `-,-´ display_selector
		   	'co_fw_rs_show_value' => array
		   			(
				   		'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_show_value'],
				   		'exclude'                 => true,
				   		'inputType'               => 'checkbox',
				   		'eval'                    => array('submitOnChange'=>false),
				   		'sql'                     => "char(1) NOT NULL default '1'"
		   			),
		   	'co_fw_rs_start' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_start'],
		   				'exclude'                 => true,
		   				'default'				=>'0',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'co_fw_rs_end' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_end'],
		   				'exclude'                 => true,
		   				'default'				=>'100',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'co_fw_rs_step' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_step'],
		   				'exclude'                 => true,
		   				'default'				=>'10',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'co_fw_rs_unity' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['co_fw_rs_unity'],
		   				'exclude'                 => true,
		   				'default'				=>'',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 ','placeholder'=>' e.g. pieces'),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			)  		      
		   
));
	  
?>

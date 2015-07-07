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

$fieldsSize=count($GLOBALS['TL_DCA']['tl_form_field']['fields'])-1;
$palettesSize=count($palettes)-1;
$default = '{type_legend},type;';
$expert ='{template_legend:hide},customTpl;{expert_legend:hide},class;';


$GLOBALS['TL_DCA']['tl_form_field']['palettes']['range_slider']=$default.'{slider_legend},rs_classes,rs_start,rs_end,rs_step,rs_show_value,rs_unity;{template_legend:hide},customTpl';
  
$fieldsSize=count($GLOBALS['TL_DCA']['tl_form_field']['fields'])-1;
array_insert($GLOBALS['TL_DCA']['tl_form_field']['fields'], $fieldsSize, array
(
			
		   	// `-,-´ range slider
		   	'rs_classes' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_classes'],
		   				'default'                 => ' ',
		   				'options'=>array(' ','radius','round'),
		   				'inputType'               => 'select',
		   				'reference'               => &$GLOBALS['TL_LANG']['tl_form_field']['rs_classes_options'],
		   				'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
		   				'sql'                     => "varchar(32) NOT NULL default ''"
		   			),
		   	// `-,-´ display_selector
		   	'rs_show_value' => array
		   			(
				   		'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_show_value'],
				   		'exclude'                 => true,
				   		'inputType'               => 'checkbox',
				   		'eval'                    => array('submitOnChange'=>false),
				   		'sql'                     => "char(1) NOT NULL default '1'"
		   			),
		   	'rs_start' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_start'],
		   				'exclude'                 => true,
		   				'default'				=>'0',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'rs_end' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_end'],
		   				'exclude'                 => true,
		   				'default'				=>'100',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'rs_step' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_step'],
		   				'exclude'                 => true,
		   				'default'				=>'10',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 '),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			),
		   	'rs_unity' => array
		   			(
		   				'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['rs_unity'],
		   				'exclude'                 => true,
		   				'default'				=>'',
		   				'inputType'               => 'text',
		   				'eval'                    => array('tl_class'=>'w50 ','placeholder'=>' e.g. pieces'),
		   				'sql'                     => "varchar(64) NOT NULL default ''"
		   			)		      
		   
));
	  
?>

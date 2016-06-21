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

$co_grid = Config::get('co_grid_wizard_palette');
$default = $co_grid.'{title_legend},name,headline,type;';
$expert  = '{template_legend:hide},navigationTpl,customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


$GLOBALS['TL_DCA']['tl_module']['palettes']['co_fw_offcanvas']    			= $default.'{nav_legend},levelOffset,showLevel,hardLimit,showProtected,co_fw_offcanvas_align,co_fw_top_bar;{reference_legend:hide},defineRoot;'.$expert;
$GLOBALS['TL_DCA']['tl_module']['palettes']['co_fw_offcanvas_custom']     	= $default.'{nav_legend},pages,showProtected,co_fw_offcanvas_align,co_fw_top_bar;'.$expert;
$GLOBALS['TL_DCA']['tl_module']['palettes']['co_fw_topbar_start']    			= $default.'{topbar_legend},co_fw_topbar_locate,co_fw_topbar_options;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['co_fw_topbar_stop']    			= $default.'{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['co_fw_topbar_section']    		= $default.'{nav_legend},dropdown_level,levelOffset,showLevel,hardLimit,showProtected,co_fw_offcanvas_align;{reference_legend:hide},defineRoot;'.$expert;
$GLOBALS['TL_DCA']['tl_module']['palettes']['co_fw_topbar_section_custom']  	= $default.'{nav_legend},pages,showProtected,co_fw_offcanvas_align,co_fw_top_bar;'.$expert;


// `-,-´ selector
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'co_fw_top_bar';
 
// `-,-´ subpalettes
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['co_fw_top_bar']='co_fw_top_bar_left,co_fw_top_bar_right';

array_insert($GLOBALS['TL_DCA']['tl_module']['fields'], $fieldsSize, array
(
	// `-,-´ topbar + dropdown
	'co_fw_dropdown_level' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_dropdown_level'],
		'exclude'                 => true,
		'placeholder'			  =>'0',
		'default'				  =>'0',
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>16, 'tl_class'=>'clr w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'co_fw_topbar_options' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_topbar_options'],
		'exclude'                 => true,
		'placeholder'			  =>'is_hover: false;sticky_on: large',
		'default'				  =>'is_hover: false;sticky_on: large',
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	
	'co_fw_topbar_locate' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_topbar_locate'],
		'default'                 => 'fixed',
		'inputType'               => 'select',
		'options'         		  => array('fixed','sticky', 'contain_to_grid'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_module']['co_fw_topbar_locate_options'],
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	// `-,-´ offcanvas + tapbar
	'co_fw_offcanvas_align' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_offcanvas_align'],
		'default'                 => 'left',
		'inputType'               => 'select',
		'options'        		  => array('left', 'right'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_module']['co_fw_offcanvas_align_options'],
		'eval'                    => array('helpwizard'=>false, 'chosen'=>true, 'submitOnChange'=>false, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'co_fw_top_bar' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_top_bar'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'co_fw_top_bar_left' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_top_bar_left'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>false, 'tl_class'=>' w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'co_fw_top_bar_right' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['co_fw_top_bar_right'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
   
));

?>
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
 
 $palettes 		= $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'];
 $palettesHide  = '{jquery_legend},addJQuery;{mootools_legend},addMooTools;';
 $palettes_ftc  = str_replace($palettesHide,",{ftc_module_legend},use_offcanvas;{ftc_js_legend},addFoundation;".$palettesHide,$palettes);
 $palettes_ftc2 = str_replace(',static',"",$palettes_ftc);
 $palettes_ftc3 = str_replace(',stylesheet',"",$palettes_ftc2);
 $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = $palettes_ftc3;
 
 array_insert($GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'],1,array('addFoundation'));
 $fieldsSize    = count($GLOBALS['TL_DCA']['tl_layout']['fields'])-1;

 $GLOBALS['TL_DCA']['tl_layout']['subpalettes']['addFoundation'] = 'FoundationJS,FTC_JS';


	  
 array_insert($GLOBALS['TL_DCA']['tl_layout']['fields'], $fieldsSize, array
	(
	'use_offcanvas' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['use_offcanvas'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>false),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'addFoundation' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['addFoundation'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'FoundationSource' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FoundationSource'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => array('local', 'cdn', 'fallback'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FoundationSource_options'],
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'FoundationJS' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FoundationJS'],
		'exclude'                 => true,
		'default'                  => 'a:9:{i:0;s:9:"accordion";i:1;s:8:"clearing";i:2;s:5:"orbit";i:3;s:8:"dropdown";i:4;s:5:"alert";i:5;s:6:"reveal";i:6;s:3:"tab";i:7;s:9:"equalizer";i:8;s:9:"offcanvas";}',
		'inputType'               => 'checkbox',
		'options'        => array('abide','accordion',
		'clearing', 'orbit','dropdown','tooltip','alert', 'reveal',
		'tab', 'joyride','equalizer','slider','topbar','offcanvas','magellan'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FoundationJS_options'],
		'eval'                    => array('multiple'=>true,'class'=>'w50 m12" style="height:auto'),
		'sql'                     => "text NULL"
	),
	'FTC_JS' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['FTC_JS'],
		'exclude'                 => true,
		'filter'                  => true,
		'search'                  => true,
		'inputType'               => 'checkbox',
		'options'        => array('modernizr','jquery','jquery.cookie','placeholder','fastclick','mediaelement_player'),
		'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['FTC_JS_options'],
		'eval'                    => array('multiple'=>true,'class'=>'w50 m12" style="height:auto'),
		'sql'                     => "text NULL"
	)
 ));
 //$GLOBALS['TL_DCA']['tl_layout']['fields']['framework']['options'] = array('tinymce.css');

	  
	  
//	  <!-- Google CDN jQuery with local fallback if offline -->
//	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
//	  <script>window.jQuery || document.write('<script src="fileadmin/templates/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	  
 
?>
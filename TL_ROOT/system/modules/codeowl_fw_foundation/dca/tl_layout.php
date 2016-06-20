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
 
 $palettes 			= $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'];
 $anchor  			= '{jquery_legend},addJQuery;';
 $palettes_ftc  	= str_replace($anchor,",{co_fw_settings_legend},co_fw_add_foundation;".$anchor,$palettes);
 $GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] 							= $palettes_ftc;
 $GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'][] 					= 'co_fw_add_foundation';
 $GLOBALS['TL_DCA']['tl_layout']['subpalettes']['co_fw_add_foundation'] = 'co_fw_use_offcanvas,co_fw_setting';


	  
 array_insert($GLOBALS['TL_DCA']['tl_layout']['fields'], 0, array
	(
	'co_fw_use_offcanvas' => array
	(
		'label'                   		=> &$GLOBALS['TL_LANG']['tl_layout']['co_fw_use_offcanvas'],
		'exclude'                 	=> true,
		'inputType'               	=> 'checkbox',
		'eval'                    		=> array('submitOnChange'=>false),
		'sql'                    		 => "char(1) NOT NULL default ''"
	),
	'co_fw_add_foundation' => array
	(
		'label'                   		=> &$GLOBALS['TL_LANG']['tl_layout']['co_fw_add_foundation'],
		'exclude'                 	=> true,
		'inputType'               	=> 'checkbox',
		'eval'                    		=> array('submitOnChange'=>true),
		'sql'                     		=> "char(1) NOT NULL default ''"
	),
	'co_fw_setting' => array
	(
		'label'                   		 => &$GLOBALS['TL_LANG']['tl_layout']['co_fw_setting'],
			'default'                  => '',
      		'exclude'                 => true,	
      		'inputType'              => 'select',
      		'eval'                    	=> array('includeBlankOption' => true, 'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
			'options_callback' => array(array('co_fw_tl_layout','getFWSettings')),
			'sql'                     => "varchar(128) NOT NULL default ''"
	)

 ));
 
 class co_fw_tl_layout extends \tl_layout
{
	public function getFWSettings(){
		$fwModels = \Codeowl\FoundationSettingsModel::findAll();
		$options = array();
		if(NULL == $fwModels){
			return $options;
		}
		while ($fwModels->next()) {
			$options[$fwModels->id] = $fwModels->name; 
		}
		return $options;
	}
}	
 //$GLOBALS['TL_DCA']['tl_layout']['fields']['framework']['options'] = array('tinymce.css');

	  
	  
//	  <!-- Google CDN jQuery with local fallback if offline -->
//	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
//	  <script>window.jQuery || document.write('<script src="fileadmin/templates/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
	  
 
?>
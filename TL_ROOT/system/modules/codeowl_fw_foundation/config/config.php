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

// `-,-´ BE MOD
array_insert($GLOBALS['BE_MOD']['design'],3,array(
	
	'tl_co_foundation_settings' => array
	(
		'tables'            	=> array('tl_co_foundation_settings'),
		'icon'           		=> 'system/modules/codeowl_fw_foundation/assets/icons/ftc-settings.png'
    )
	// 'tl_co_fw_intro' 			=> array
	// (
	// 	'callback'          	=> 'Codeowl\Intro',
	// 	'icon'           		=> 'system/modules/codeowl_fw_foundation/assets/icons/icon.png'    
	// )
));

$GLOBALS['TL_MODELS']['tl_co_foundation_settings'] = 'FoundationSettingsModel';
	

//$GLOBALS['TL_HOOKS']['getUserNavigation'][] = array('Themes', 'changeNav');

// `-,-´ Wrapper elements
array_insert($GLOBALS['TL_WRAPPERS']['start'],0, array
(
		'acc_ftc_start',
		'acc_ftc_start_inside',
		'tab_ftc_start',
		'tab_ftc_start_inside',
		'button_bar_start_ftc',
		'dropdown_buttons_content_start',
		'orbit_start',
		'orbit_start_inside',
		'reveal_modal_start',
	)
	
);

array_insert($GLOBALS['TL_WRAPPERS']['stop'],0, array
(	
		'acc_ftc_stop',
		'acc_ftc_stop_inside',
		'tab_ftc_stop',
		'tab_ftc_stop_inside',
		'button_bar_stop_ftc',
		'dropdown_buttons_content_stop',
		'orbit_stop',
		'orbit_stop_inside',
		'reveal_modal_stop',
		'magellan_stop'
	)
);

// `-,-´ Content elements
$CTEsize =count($GLOBALS['TL_CTE']);
array_insert($GLOBALS['TL_CTE'] ,$CTEsize, array
(
	'ftc_orbit' => array
	(
		'orbit'        			=> 'ContentOrbit',
		'orbit_start'     		=> 'ContentOrbitStart',
		'orbit_stop'      		=> 'ContentOrbitStop',
		'orbit_start_inside'    => 'ContentOrbitStartInside',
		'orbit_stop_inside'     => 'ContentOrbitStopInside'
	),	
	'ftc_clearing' => array
	(
		'clearing'            	=> 'ContentClearing'
	),
	'ftc_accordion' => array
	(
		'acc_ftc_start'  		=> 'ContentAccStartFTC',
		'acc_ftc_stop'   		=> 'ContentAccStopFTC',
		'acc_ftc_start_inside'  => 'ContentAccStartInsideFTC',
		'acc_ftc_stop_inside'   => 'ContentAccStopInsideFTC'
	),
	'ftc_tab' => array
	(
		'tab_ftc_start'  		=> 'ContentTabStartFTC',
		'tab_ftc_stop'   		=> 'ContentTabStopFTC',
		'tab_ftc_start_inside'  => 'ContentTabStartInsideFTC',
		'tab_ftc_stop_inside'   => 'ContentTabStopInsideFTC'
	),
	 'ftc_media' => array
	 (
		'flex_video'        	=> 'ContentFlexVideo',
		'placeholder_image'     => 'ContentPlaceholderImage',
	),
	'ftc_links' => array
	(
		'hyperlink'       		=> 'ContentHyperlink',
		'toplink'         		=> 'ContentToplink',
		'download'        		=> 'ContentDownload',
		'downloads'       		=> 'ContentDownloads'
		
	),
	'ftc_buttons' => array
	(
		'button_ftc'            => 'ContentButtonFTC',
		'button_bar_start_ftc'  => 'ContentButtonBarStartFTC',
		'button_bar_stop_ftc'   => 'ContentButtonBarStopFTC',
		'button_group'          => 'ContentButtonGroup',
		'dropdown_buttons'      => 'ContentDropdownButtons',
		'dropdown_buttons_content_start'   => 'ContentDropdownButtonsContentStart',
		'dropdown_buttons_content_stop'    => 'ContentDropdownButtonsContentStop'
		
	),
	'ftc_callouts_prompts' => array
	(
		
		'joyride'           	=> 'ContentJoyride',
		'alert_box'            	=> 'ContentAlertBox',
		'reveal_modal_start'    => 'ContentRevealModalStart',
		'reveal_modal_stop'     => 'ContentRevealModalStop'
		
		
	),
	'ftc_magellan' => array
	(
		
		'magellan_nav'			=> 'ContentMagellanNav',
		'magellan_stop'			=> 'ContentMagellanStop'
	),
	'ftc_content' => array
	(
		
		'headline'            	=> 'ContentHeadline',
		'blockquote'            => 'ContentBlockquote',
		'vcard'            		=> 'ContentVCard',
		'list'            		=> 'ContentList',
		'def_list'            	=> 'ContentDefList',
		'progress_bar'          => 'ContentProgressBar',
		'price_table'        	=> 'ContentPriceTable',
		'table'           		=> 'ContentTable',
		'text'            		=> 'ContentText'
		
	),	
'ftc_code' => array
	(
		'html'            		=> 'ContentHtml',
		'code'            		=> 'ContentCode',
		'markdown'        		=> 'ContentMarkdown'
		
	)
));


// `-,-´ FE MOD
array_insert($GLOBALS['FE_MOD'], 2, array
(
    'tl_ftc' => array
    (
        'ftc_topbar_start'         => 'ModuleTopbarStart',
        'ftc_topbar_section'         => 'ModuleTopbarSection',
        'ftc_topbar_section_custom'         => 'ModuleTopbarSectionCustom',
        'ftc_topbar_stop'         => 'ModuleTopbarStop',
        'ftc_offcanvas'         => 'ModuleOffcanvas',
        'ftc_offcanvas_custom'         => 'ModuleOffcanvasCustom'
    )
));

// `-,-´ Front end form fields

array_insert($GLOBALS['TL_FFL'], 2, array
(
 	'range_slider'    => 'FormRangeSlider'
));
 
// `-,-´ Change Contao CTE 
$core_key ='texts,accordion,links,media,slider,files';
$key_search = 'ftc_media,ftc_links,ftc_content,ftc_code';
foreach (explode(',', $core_key) as $ckey) {
	//echo $ckey.'<br>2';
	foreach ($GLOBALS['TL_CTE'][$ckey] as $ekey=>$eval) {
		//	echo '<br>'.$ekey.'<br>3';
		
		foreach (explode(',', $key_search) as $skey) {
			//	echo $skey.'<br>4';
			foreach ($GLOBALS['TL_CTE'][$skey] as $fkey => $fval) {
					
				 if (array_key_exists($ekey, $GLOBALS['TL_CTE'][$skey])) {
				 	//echo $ckey.'-'.$fkey.'<br>';
				 	unset($GLOBALS['TL_CTE'][$ckey][$ekey]);
				 }
			}
			
		}
		
	}
}
// `-,-´ Unset unneeded core sections
// unset($GLOBALS['TL_CTE']['texts']);
 unset($GLOBALS['TL_CTE']['accordion']);
// unset($GLOBALS['TL_CTE']['links']);
// unset($GLOBALS['TL_CTE']['media']);
 unset($GLOBALS['TL_CTE']['slider']);
// unset($GLOBALS['TL_CTE']['files']);

if (TL_MODE =='FE') {
 $GLOBALS['TL_HOOKS']['parseTemplate'][] 			= array('OutputFoundationVars', 'templates');
}


if (TL_MODE =='BE') {
// `-,-´ Get the highest value from the FW Settings
	if (Input::get('do') !=='composer'&&Input::get('do') !=='settings'&&Input::get('do') !=='repository_manager') {
		$FoundationSettingsModel = new Codeowl\FoundationSettingsModel;
		$GLOBALS['TL_CONFIG']['co_grid_columns_size'] 	 	= $FoundationSettingsModel->getMaxCols();
	}	

// `-,-´ SCSS Variablen 
$GLOBALS['TL_CONFIG']['co_foundation_vars']										= array();
$GLOBALS['TL_CONFIG']['co_foundation_vars']['primary_color']['var_scss'] 		= '$primary-color';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['primary_color']['pre_scss'] 		= '#';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['secondary_color']['var_scss'] 	= '$secondary-color';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['secondary_color']['pre_scss'] 	= '#';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['alert_color']['var_scss'] 		= '$alert-color';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['alert_color']['pre_scss'] 		= '#';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['success_color']['var_scss'] 		= '$success-color';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['success_color']['pre_scss'] 		= '#';

$GLOBALS['TL_CONFIG']['co_foundation_vars']['body_font_color']['var_scss'] 	= '$body-font-color';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['body_font_color']['pre_scss'] 	= '#';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['header_font_color']['var_scss'] 	= '$header-font-color';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['header_font_color']['pre_scss'] 	= '#';

$GLOBALS['TL_CONFIG']['co_foundation_vars']['text_direction']['var_scss'] 		= '$text-direction';

$GLOBALS['TL_CONFIG']['co_foundation_vars']['cols']['var_scss'] 				= '$total-columns';

$GLOBALS['TL_CONFIG']['co_foundation_vars']['breakpoint']['var_scss'] 			= '$small-range-b'; //(a,b)
$GLOBALS['TL_CONFIG']['co_foundation_vars']['breakpoint']['post_scss'] 		= 'em';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['max_width']['var_scss'] 			= '$row-width'; //$row-width: rem-calc(1000) !default;
$GLOBALS['TL_CONFIG']['co_foundation_vars']['max_width']['post_scss'] 			= 'rem';

$GLOBALS['TL_CONFIG']['co_foundation_vars']['gap']['var_scss'] 				= '$column-gutter';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['gap']['post_scss'] 				= 'em';

$GLOBALS['TL_CONFIG']['co_foundation_vars']['radius']['var_scss'] 				= '$global-radius';
$GLOBALS['TL_CONFIG']['co_foundation_vars']['radius']['post_scss'] 			= 'px';


}
?>

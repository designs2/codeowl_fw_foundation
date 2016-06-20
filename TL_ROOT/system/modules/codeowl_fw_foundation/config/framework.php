<?php
/** 
 * Extension for Contao Open Source CMS
 *
 * Copyright (C) 2016 Monique Hahnefeld
 *
 * @package codeowl_fw_foundation
 * @author  Monique Hahnefeld <info@monique-hahnefeld.de>
 * @link    http://codeowl.org
 * @license LGPLv3
 *
 * `-,-´
 *	( )  codeowl.org
 *************************/
 
 
// `-,-´  framework settings

/* Each item in the list is a module with any of these keys:
*   - sass: Name of the CSS export. 'grid' becomes '@include foundation-grid;'
*   - js: Name of the JavaScript file. 'accordion' becomes 'foundation.accordion.js'
*   - js_utils: Names of plugin dependencies. 'box' becomes 'foundation.util.box.js'
*/

// `-,-´  @string sass, @string js, @array utils
$fwPathToFolder 					= TL_ROOT.TL_PATH."/system/modules/codeowl_fw_foundation/assets/foundation";
$fwModuleSassPrefix 				= 'foundation-';
$fwModuleJsPrefix 					= 'foundation.';
$fwModuleJsUtilsPrefix		 	= 'foundation.util.';
$fwModulePackages 				=  array(
											'grid' 							=> array('grid/grid'),
											'flex_grid' 					=> array('grid/flex_grid'), //advice - don't use both
											'forms' 						=> array('forms/forms'),
											'visibility_classes' 		=> array('components/visibility'),
											'typography' 				=> array('components/typography'),
											//'base_styles' 				=> array('base_styles',false), //
											//'helper_classes' 			=> array('helper_classes',false), //
											'button' 						=> array('components/button'),
											'button_group' 			=> array('components/button_group'),
											'close_button' 			=> array('components/close_button'),
											'slider_js' 					=> array('components/slider','slider',array('box','motion','triggers','mediaQuery','keyboard')),
											'switch' 						=> array('components/switch'),
											//'overview' 					=> array('overview',false), //
											'menu' 						=> array('components/menu'),
											'dropdown_menu_js' 	=> array('components/dropdownmenu','dropdown_menu',array('keyboard','motion','box','nest')),
											'drilldown_menu_js' 	=> array('components/drilldown','drilldown_menu',array('keyboard','motion','nest')),
											'accordion_menu_js' 	=> array('accordion_menu','accordion_menu',array('keyboard','motion','nest')),
											'top_bar' 					=> array('components/top-bar'),
											'responsive_navigation' 	=> array('0','responsiveMenu',array('triggers','mediaQuery')),
											'magellan_js' 				=> array('components/magellan','magellan'),
											'pagination' 				=> array('components/pagination'),
											'breadcrumbs' 			=> array('components/breadcrumbs'),
											'accordion_js' 			=> array('components/accordion','accordion', array('keyboard','motion')),
											'callout' 						=> array('components/callout'),
											'dropdown_js' 			=> array('components/dropdown','dropdown',array('keyboard','box','triggers')),
											'media_object' 			=> array('components/media_object'),
											'offcanvas_js' 				=> array('components/off-canvas','offcanvas'),
											'reveal_js' 					=> array('components/reveal','reveal',array('box','motion','triggers','mediaQuery','keyboard')),
											'table' 						=> array('components/table'),
											//'table_js' 					=> array('table_js',false), // explanation of table js
											'badge' 						=> array('components/badge'),
											'flex_video' 				=> array('components/flex-video'),
											'label' 						=> array('components/label'),
											'orbit_js' 					=> array('components/orbit','orbit', array('motion','timerAndImageLoader','keyboard','touch')),
											'progressbar' 				=> array('components/progress-bar'),
											'thumbnail' 				=> array('components/thumbnail'),
											'tooltip_js' 					=> array('components/tooltip','tooltip', array('box','triggers','mediaQuery','motion')),
									
											// `-,-´  PlugIns
											'abide_pi' 					=> array('abide'),
											'equilizer_pi' 				=> array('equilizer'),
											'interchange_pi' 			=> array('interchange','interchange',array('triggers','timerAndImageLoader')),
											'toggler_pi' 				=> array('toggler'),
											'sticky_pi' 					=> array('sticky')
		);
		$fwSettingTextfields 				=  array(
																'general_vars',
																'typography_vars',
																'controls_vars',
																'navigation_vars',
																'containers_vars',
																'modal_vars',
																'media_vars',
																'carousel_vars',
																'plugins_vars'
		);
		
?>
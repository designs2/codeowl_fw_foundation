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
 
 
// `-,-´  Framework settings

/* Each item in the list is a module with any of these keys:
*   - sass: Name of the CSS export. 'grid' becomes '@include foundation-grid;'
*   - js: Name of the JavaScript file. 'accordion' becomes 'foundation.accordion.js'
*   - js_utils: Names of plugin dependencies. 'box' becomes 'foundation.util.box.js'
*/

// `-,-´  @string sass, @string js, @array utils
$fwPathToFolder 					= TL_ROOT."/system/modules/codeowl_fw_foundation/assets/foundation";
$fwModuleSassPrefix 				= 'foundation-';
$fwModuleJsPrefix 					= 'foundation.';
$fwModuleJsUtilsPrefix		 	= 'foundation.util.';
$fwModulePackages 				=  array(

											'grid' 							=> array('grid','grid'),
											'flex_grid' 					=> array('grid','flex-grid'), //advice - don't use both?
											'forms' 						=> array('forms','forms'),
											'visibility_classes' 		=> array('components','visibility'),
											'float' 		=> array('components','float'),
											'typography' 				=> array('components','typography'),
											//'base_styles' 				=> array('base_styles',false), ','
											//'helper_classes' 			=> array('helper_classes',false), ','
											'button' 						=> array('components','button'),
											'button_group' 			=> array('components','button-group'),
											'close_button' 			=> array('components','close-button'),
											'slider_js' 					=> array('components','slider','slider',array('box','motion','triggers','mediaQuery','keyboard')),
											'switch' 						=> array('components','switch'),
											//'overview' 					=> array('overview',false), ','
											'menu' 						=> array('components','menu'),
											'dropdown_menu_js' 	=> array('components','dropdown-menu','dropdown_menu',array('keyboard','motion','box','nest')),
											'drilldown_menu_js' 	=> array('components','drilldown','drilldown_menu',array('keyboard','motion','nest')),
											'accordion_menu_js' 	=> array('components','accordion-menu','accordion_menu',array('keyboard','motion','nest')),
											'top_bar' 					=> array('components','top-bar'),
											'responsive_navigation' 	=> array('','','responsiveMenu',array('triggers','mediaQuery')),
											'magellan_js' 				=> array('','','magellan',array('motion')),
											'pagination' 				=> array('components','pagination'),
											'breadcrumbs' 			=> array('components','breadcrumbs'),
											'accordion_js' 			=> array('components','accordion','accordion', array('keyboard','motion')),
											'callout' 						=> array('components','callout'),
											'dropdown_js' 			=> array('components','dropdown','dropdown',array('keyboard','box','triggers')),
											'media_object' 			=> array('components','media-object'),
											'offcanvas_js' 				=> array('components','off-canvas','offcanvas'),
											'reveal_js' 					=> array('components','reveal','reveal',array('box','motion','triggers','mediaQuery','keyboard')),
											'table_fw' 						=> array('components','table'),
											//'table_js' 					=> array('table_js',false), ',' explanation of table js
											'badge' 						=> array('components','badge'),
											'flex_video' 				=> array('components','flex-video'),
											'label' 						=> array('components','label'),
											'orbit_js' 					=> array('components','orbit','orbit', array('motion','timerAndImageLoader','keyboard','touch')),
											'progressbar' 				=> array('components','progress-bar'),
											'thumbnail' 				=> array('components','thumbnail'),
											'tooltip_js' 					=> array('components','tooltip','tooltip', array('box','triggers','mediaQuery','motion')),
									
											// `-,-´  PlugIns
											'abide_pi' 					=> array('','','abide'),
											'equilizer_pi' 				=> array('','','equilizer'),
											'interchange_pi' 			=> array('','','interchange',array('triggers','timerAndImageLoader')),
											'toggler_pi' 				=> array('','','toggler',array('motion')),
											'sticky_pi' 					=> array('components','sticky', 'sticky',array('triggers','mediaQuery'))
		);
		
		$fwSettingTextfields 				=  array(
																'general',
																'typography',
																'controls',
																'navigation',
																'containers',
																'modal',
																'media',
																'carousel',
																'plugins'
		);
		
?>
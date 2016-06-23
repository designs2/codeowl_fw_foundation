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

// `-,-´  @string folder, sass-file, sass-mixin, js-file, @array utils
$fwPathToFolder 					= TL_ROOT."/system/modules/codeowl_fw_foundation/assets/foundation";
$fwModuleSassPrefix 				= 'foundation-';
$fwModuleJsPrefix 					= 'foundation.';
$fwModuleJsUtilsPrefix		 	= 'foundation.util.';
$fwModulePackages 				=  array(

											'grid' 							=> array('grid','grid','grid'),
											'flex_grid' 					=> array('grid','flex-grid','flex-grid'), //advice - don't use both?
											'forms' 						=> array('forms','forms','forms'),
											'typography' 				=> array('components','typography','typography'),
											//'base_styles' 				=> array('base_styles',false), ','
											//'helper_classes' 			=> array('helper_classes',false), ','
											'button' 						=> array('components','button','button'),
											'button_group' 			=> array('components','button-group','button-group'),
											'close_button' 			=> array('components','close-button','close-button'),
											'slider_js' 					=> array('components','slider','slider','slider',array('box','motion','triggers','mediaQuery','keyboard')),
											'switch' 						=> array('components','switch','switch'),
										
											'menu' 						=> array('components','menu','menu'),
											'dropdown_menu_js' 	=> array('components','dropdown-menu','dropdown-menu','dropdownMenu',array('keyboard','motion','box','nest')),
											'drilldown_menu_js' 	=> array('components','drilldown','drilldown-menu','drilldown',array('keyboard','motion','nest')),
											'accordion_menu_js' 	=> array('components','accordion-menu','accordion-menu','accordionMenu',array('keyboard','motion','nest')),
											'title_bar' 					=> array('components','title-bar','title-bar'),
											'top_bar' 					=> array('components','top-bar','top-bar'),
											'responsive_navigation' 	=> array('','','',array('responsiveMenu','responsiveToggle'),array('triggers','mediaQuery')),
											'magellan_js' 				=> array('','','','magellan',array('motion')),
											'pagination' 				=> array('components','pagination','pagination'),
											'breadcrumbs' 			=> array('components','breadcrumbs','breadcrumbs'),
											'accordion_js' 			=> array('components','accordion','accordion','accordion', array('keyboard','motion')),
											'callout' 						=> array('components','callout','callout'),
											'dropdown_js' 			=> array('components','dropdown','dropdown','dropdown',array('keyboard','box','triggers')),
											'media_object' 			=> array('components','media-object','media-object'),
											'offcanvas_js' 				=> array('components','off-canvas','off-canvas','offcanvas'),
											'reveal_js' 					=> array('components','reveal','reveal','reveal',array('box','motion','triggers','mediaQuery','keyboard')),
											'table_fw' 					=> array('components','table','table'),
											'tabs_js' 					=> array('components','tabs','tabs','tabs',array('keyboard','timerAndImageLoader')),
											'badge' 						=> array('components','badge','badge'),
											'flex_video' 				=> array('components','flex-video','flex-video'),
											'label' 						=> array('components','label','label'),
											'orbit_js' 					=> array('components','orbit','orbit','orbit', array('motion','timerAndImageLoader','keyboard','touch')),
											'progressbar' 				=> array('components','progress-bar','progress-bar'),
											'thumbnail' 				=> array('components','thumbnail','thumbnail'),
											'tooltip_js' 					=> array('components','tooltip','tooltip','tooltip', array('box','triggers','mediaQuery','motion')),
											'visibility_classes' 		=> array('components','visibility','visibility-classes'),
											
											// `-,-´  Manuel added
											'responsive_toggle' 	=> array('','','','responsiveToggle',array('mediaQuery')),
											
											//		'meter_element' 	=> array('','','meter-element'),
											'progress_element' 		=> array('','','progress-element'),
											'menu_icon' 				=> array('components','menu-icon','menu-icon'),
											'input_range' 				=> array('','','range-input'),

											'float' 						=> array('components','float','float-classes'),
											'flex' 							=> array('components','flex','flex-classes'),
											
											// `-,-´  PlugIns
											'abide_pi' 					=> array('','','','abide'),
											'equilizer_pi' 				=> array('','','','equilizer'),
											'interchange_pi' 			=> array('','','','interchange',array('triggers','timerAndImageLoader')),
											'toggler_pi' 				=> array('','','','toggler',array('motion')),
											'sticky_pi' 					=> array('components','sticky', 'sticky', 'sticky',array('triggers','mediaQuery'))
											
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
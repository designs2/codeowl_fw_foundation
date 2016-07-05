<?php
/* 
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


// `-,-´ Register the namespaces
ClassLoader::addNamespaces(array
(
	'Contao',
	'Codeowl',
));

// `-,-´ Register the classes
ClassLoader::addClasses(array
(
	
	// `-,-´ HOOKs
	'Codeowl\OutputFoundationVars'  => 'system/modules/codeowl_fw_foundation/classes/OutputFoundationVars.php',
	'Codeowl\Hooks' 				=> 'system/modules/codeowl_fw_foundation/classes/Hooks.php',
	
	// `-,-´ Models
	'Codeowl\FoundationSettingsModel' 	=> 'system/modules/codeowl_fw_foundation/models/FoundationSettingsModel.php',
	
	// `-,-´ Modules
	'Codeowl\ModuleExt'  				=> 'system/modules/codeowl_fw_foundation/modules/ModuleExt.php',
	'Codeowl\ModuleOffcanvasCustom'  	=> 'system/modules/codeowl_fw_foundation/modules/ModuleOffcanvasCustom.php',
	'Codeowl\ModuleOffcanvas'  			=> 'system/modules/codeowl_fw_foundation/modules/ModuleOffcanvas.php',
	// `-,-´ Topbar
	'Codeowl\ModuleTopbarStart'  		=> 'system/modules/codeowl_fw_foundation/modules/ModuleTopbarStart.php',
	'Codeowl\ModuleTopbarStop'  		=> 'system/modules/codeowl_fw_foundation/modules/ModuleTopbarStop.php',
	'Codeowl\ModuleTopbarSectionCustom' => 'system/modules/codeowl_fw_foundation/modules/ModuleTopbarSectionCustom.php',
	'Codeowl\ModuleTopbarSection'  		=> 'system/modules/codeowl_fw_foundation/modules/ModuleTopbarSection.php',
	// `-,-´ Classes
	'Codeowl\Upgrade'  					=> 'system/modules/codeowl_fw_foundation/classes/Upgrade.php',	
	'Codeowl\Intro'  							=> 'system/modules/codeowl_fw_foundation/classes/Intro.php',	
	'Codeowl\Themes'  						=> 'system/modules/codeowl_fw_foundation/classes/Themes.php',
	// `-,-´ Elements magellan
	'Codeowl\ContentMagellanNav'  		=> 'system/modules/codeowl_fw_foundation/elements/magellan/ContentMagellanNav.php',
	'Codeowl\ContentMagellanStop'  		=> 'system/modules/codeowl_fw_foundation/elements/magellan/ContentMagellanStop.php',
	// `-,-´ Elements acc
	'Codeowl\ContentAccStartFTC'  		=> 'system/modules/codeowl_fw_foundation/elements/accordion/ContentAccStartFTC.php',
	'Codeowl\ContentAccStopFTC'  		=> 'system/modules/codeowl_fw_foundation/elements/accordion/ContentAccStopFTC.php',
	'Codeowl\ContentAccStartInsideFTC'  => 'system/modules/codeowl_fw_foundation/elements/accordion/ContentAccStartInsideFTC.php',
	'Codeowl\ContentAccStopInsideFTC'  	=> 'system/modules/codeowl_fw_foundation/elements/accordion/ContentAccStopInsideFTC.php',
	// `-,-´ Elements tab
	'Codeowl\ContentTabStartFTC'  		=> 'system/modules/codeowl_fw_foundation/elements/tab/ContentTabStartFTC.php',
	'Codeowl\ContentTabStopFTC'  		=> 'system/modules/codeowl_fw_foundation/elements/tab/ContentTabStopFTC.php',
	'Codeowl\ContentTabStartInsideFTC'  => 'system/modules/codeowl_fw_foundation/elements/tab/ContentTabStartInsideFTC.php',
	'Codeowl\ContentTabStopInsideFTC'   => 'system/modules/codeowl_fw_foundation/elements/tab/ContentTabStopInsideFTC.php',
	// `-,-´ Elements Content
	'Codeowl\ContentListFTC'  			=> 'system/modules/codeowl_fw_foundation/elements/content/ContentListFTC.php',
	'Codeowl\ContentDefList'  			=> 'system/modules/codeowl_fw_foundation/elements/content/ContentDefList.php',
	'Codeowl\ContentPriceTable'  		=> 'system/modules/codeowl_fw_foundation/elements/content/ContentPriceTable.php',
	'Codeowl\ContentBlockquote'  		=> 'system/modules/codeowl_fw_foundation/elements/content/ContentBlockquote.php',
	'Codeowl\ContentVCard'  			=> 'system/modules/codeowl_fw_foundation/elements/content/ContentVCard.php',
	'Codeowl\ContentProgressBar'  		=> 'system/modules/codeowl_fw_foundation/elements/content/ContentProgressBar.php',
	// `-,-´ Elements Buttons Dropdown
	'Codeowl\ContentButtonBarStartFTC'  => 'system/modules/codeowl_fw_foundation/elements/buttons/ContentButtonBarStartFTC.php',
	'Codeowl\ContentButtonBarStopFTC'   => 'system/modules/codeowl_fw_foundation/elements/buttons/ContentButtonBarStopFTC.php',
	'Codeowl\ContentButtonGroup'  		=> 'system/modules/codeowl_fw_foundation/elements/buttons/ContentButtonGroup.php',
	'Codeowl\ContentButtonFTC'  		=> 'system/modules/codeowl_fw_foundation/elements/buttons/ContentButtonFTC.php',
	'Codeowl\ContentDropdownButtons'  	=> 'system/modules/codeowl_fw_foundation/elements/buttons/ContentDropdownButtons.php',
	'Codeowl\ContentDropdownButtonsContentStart'  => 'system/modules/codeowl_fw_foundation/elements/buttons/ContentDropdownButtonsContentStart.php',
	'Codeowl\ContentDropdownButtonsContentStop'   => 'system/modules/codeowl_fw_foundation/elements/buttons/ContentDropdownButtonsContentStop.php',
	// `-,-´ Slider und Gallery
	'Codeowl\ContentOrbit'  			=> 'system/modules/codeowl_fw_foundation/elements/orbit/ContentOrbit.php',
	'Codeowl\ContentOrbitStart'  		=> 'system/modules/codeowl_fw_foundation/elements/orbit/ContentOrbitStart.php',
	'Codeowl\ContentOrbitStop'  		=> 'system/modules/codeowl_fw_foundation/elements/orbit/ContentOrbitStop.php',
	'Codeowl\ContentOrbitStartInside'   => 'system/modules/codeowl_fw_foundation/elements/orbit/ContentOrbitStartInside.php',
	'Codeowl\ContentOrbitStopInside'  	=> 'system/modules/codeowl_fw_foundation/elements/orbit/ContentOrbitStopInside.php',
	'Codeowl\ContentClearing'  			=> 'system/modules/codeowl_fw_foundation/elements/clearing/ContentClearing.php',
	// `-,-´ Videos
	'Codeowl\ContentFlexVideo'  		=>	'system/modules/codeowl_fw_foundation/elements/media/ContentFlexVideo.php',
	//placeholder
	'Codeowl\ContentPlaceholderImage'  	=>	'system/modules/codeowl_fw_foundation/elements/media/ContentPlaceholderImage.php',
	// `-,-´ Prompts & Callouts
	'Codeowl\ContentRevealModalStart' 	=>	'system/modules/codeowl_fw_foundation/elements/callouts_prompts/ContentRevealModalStart.php',
	'Codeowl\ContentRevealModalStop'  	=>	'system/modules/codeowl_fw_foundation/elements/callouts_prompts/ContentRevealModalStop.php',
	'Codeowl\ContentAlertBox'  			=>	'system/modules/codeowl_fw_foundation/elements/callouts_prompts/ContentAlertBox.php',
	'Codeowl\ContentJoyride'  			=>	'system/modules/codeowl_fw_foundation/elements/callouts_prompts/ContentJoyride.php',
	// `-,-´ Form Elements FTC
	'Codeowl\FormRangeSlider'  			=> 'system/modules/codeowl_fw_foundation/forms/FormRangeSlider.php'
			
));

// `-,-´ Register the templates
TemplateLoader::addFiles(array
(	
	// `-,-´ For BE Theme
	'be_ftc_introduction' => 'system/modules/codeowl_fw_foundation/templates/backend',
	// `-,-´ Layouts
	'fe_page_gc_ftc' => 'system/modules/codeowl_fw_foundation/templates/frontend',
	// `-,-´ Modules
	'mod_topbar_start' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_topbar_section' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_topbar_stop' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'nav_default_topbar' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_navigation_offcanvas' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'nav_default_offcanvas' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_search_simple_topbar' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'search_default_topbar' => 'system/modules/codeowl_fw_foundation/templates/modules',
	// `-,-´ Elements
	'ce_magellan_nav'  => 'system/modules/codeowl_fw_foundation/templates/magellan',
	'ce_magellan_stop'  => 'system/modules/codeowl_fw_foundation/templates/magellan',
	// `-,-´ Forms
	'form_range_slider' => 'system/modules/codeowl_fw_foundation/templates/forms',
	// `-,-´ Accordion
	'ce_acc_start' => 'system/modules/codeowl_fw_foundation/templates/accordion',
	'ce_acc_stop' => 'system/modules/codeowl_fw_foundation/templates/accordion',
	'ce_acc_start_inside' => 'system/modules/codeowl_fw_foundation/templates/accordion',
	'ce_acc_stop_inside' => 'system/modules/codeowl_fw_foundation/templates/accordion',
	// `-,-´ Tabs
	'ce_tab_start' => 'system/modules/codeowl_fw_foundation/templates/tab',
	'ce_tab_stop' => 'system/modules/codeowl_fw_foundation/templates/tab',
	'ce_tab_start_inside' => 'system/modules/codeowl_fw_foundation/templates/tab',
	'ce_tab_stop_inside' => 'system/modules/codeowl_fw_foundation/templates/tab',
	// `-,-´ Buttons
	'ce_button_ftc' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	'ce_button_group' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	'ce_button_bar_start_ftc' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	'ce_button_bar_stop_ftc' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	'ce_dropdown_buttons' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	'ce_dropdown_buttons_content_start' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	'ce_dropdown_buttons_content_stop' => 'system/modules/codeowl_fw_foundation/templates/buttons',
	// `-,-´ Orbit Slider
	'ce_orbit' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	'ce_orbit_start' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	'ce_orbit_stop' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	'ce_orbit_start_inside' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	'ce_orbit_stop_inside' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	'orbit_list' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	'picture_orbit' => 'system/modules/codeowl_fw_foundation/templates/orbit',
	// `-,-´ Clearing Lightbox
	'ce_clearing' => 'system/modules/codeowl_fw_foundation/templates/clearing',
	'clearing_list' => 'system/modules/codeowl_fw_foundation/templates/clearing',
	'picture_clearing' => 'system/modules/codeowl_fw_foundation/templates/clearing',
	'pagination' => 'system/modules/codeowl_fw_foundation/templates/clearing',	
	// `-,-´ Further Content Elements
	'ce_blockquote' => 'system/modules/codeowl_fw_foundation/templates/content',
	'ce_def_list' => 'system/modules/codeowl_fw_foundation/templates/content',
	'ce_list_ftc' => 'system/modules/codeowl_fw_foundation/templates/content',
	'ce_price_table' => 'system/modules/codeowl_fw_foundation/templates/content',
	'ce_vcard' => 'system/modules/codeowl_fw_foundation/templates/content',
	'ce_progress_bar' => 'system/modules/codeowl_fw_foundation/templates/content',
	'ce_placeholder_image' => 'system/modules/codeowl_fw_foundation/templates/media',
	'ce_flex_video' => 'system/modules/codeowl_fw_foundation/templates/media',
	'ce_reveal_modal_start' => 'system/modules/codeowl_fw_foundation/templates/callouts_prompts',
	'ce_reveal_modal_stop' => 'system/modules/codeowl_fw_foundation/templates/callouts_prompts',
	'ce_alert_box' => 'system/modules/codeowl_fw_foundation/templates/callouts_prompts',
	'ce_joyride' => 'system/modules/codeowl_fw_foundation/templates/callouts_prompts',
	// `-,-´ Core 
	'mod_article_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_article_teaser_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_article_nav_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_breadcrumb_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_random_image_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_navigation_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_search_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_login_1cl_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_login_2cl_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	'mod_password_ftc' => 'system/modules/codeowl_fw_foundation/templates/modules',
	// `-,-´ Javascript components 
	'co_fw_core' => 'system/modules/codeowl_fw_foundation/templates/js',
	'slider_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'dropdown_menu_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'drilldown_menu_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'magellan_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'accordion_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'accordion_menu_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'dropdown_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'offcanvas_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'reveal_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'tabs_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'orbit_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'tooltip_js' => 'system/modules/codeowl_fw_foundation/templates/js',
	'abide_pi' => 'system/modules/codeowl_fw_foundation/templates/js',
	'equalizer_pi' => 'system/modules/codeowl_fw_foundation/templates/js',
	'interchange_pi' => 'system/modules/codeowl_fw_foundation/templates/js',
	'toggler_pi' => 'system/modules/codeowl_fw_foundation/templates/js',
	'sticky_pi' => 'system/modules/codeowl_fw_foundation/templates/js' 
		
));

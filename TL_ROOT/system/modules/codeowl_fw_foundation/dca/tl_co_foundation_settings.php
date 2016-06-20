<?php
/** 
 * Extension for Contao Open Source CMS
 *
 * Copyright (C) 2016 Monique Hahnefeld
 *
 * @package codeowl_fw_foundation
 * @author  Monique Hahnefeld <info@monique-hahnefeld.de>
 * @link    http://designs2.org
 * @license LGPLv3
 *
 * `-,-´
 *	 ( )  codeowl.org
 *************************/
 
 
// `-,-´  helper for dca container
function createCheckboxArray($name,$onchange){
	
	return  array
				(
					'label'                   		=> &$GLOBALS['TL_LANG']['tl_co_foundation_settings'][$name],
					'exclude'                	=> true,
					'default'               		=> '1',
					'inputType'               	=> 'checkbox',
					'eval'                    		=> array('tl_class'=>'clr w25', 'submitOnChange' => $onchange),
					'sql'                     		=> "char(1) NOT NULL default ''"
				);
}

function createTextareaArray($name,$default){
	
	return  array
				(
					'label'                   		=> &$GLOBALS['TL_LANG']['tl_co_foundation_settings'][$name],
					'pre_scss'                  => &$GLOBALS['TL_LANG']['tl_co_foundation_settings'][$name]['pre_scss'],
					'post_scss'                 => &$GLOBALS['TL_LANG']['tl_co_foundation_settings'][$name]['post_scss'],
					'exclude'                 	=> true,
					'default'						=> $default,
					'inputType'               	=> 'textarea',	
					'eval'                    		=> array('maxlength'=>3000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
					'sql'                     		=> "text NULL"
				);
}

// `-,-´ Table tl_co_foundation_settings
$GLOBALS['TL_DCA']['tl_co_foundation_settings'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'Vwidth'            => 640,
		'Vheight'            => 480,
		'onsubmit_callback' => array(  
		array('Codeowl\Themes', 'generate')
		),

		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index'	
			)
		)
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                  => 1,
			'fields'                => array('name'),
			'flag'                  => 1,
		),
		'label' => array
		(
		    'fields'                  => array('name','id','theme_folder'),
		    'format'                  => '%s | %s | %s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset()"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'				
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"'				
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['tl_co_foundation_settings']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		),
	),
	'palettes' => array
	(
		'__selector__'              => array('add_general_vars','add_typography_vars','add_controls_vars','add_navigation_vars','add_containers_vars','add_modal_vars','add_media_vars','add_carousel_vars','add_plugins_vars'),//{font_legend},icon_fonts,fonts;

		'default'                     => '{type_legend},name,theme_folder;
		{color_legend},primary_color,secondary_color,alert_color,success_color,body_font_color,header_font_color;
	
		{grid_legend},cols,breakpoint,max_width,gap,radius;
		
		{general_legend},grid, flex_grid, forms, visibility_classes, add_general_vars;		
		{typography_legend},text_direction,typography, add_typography_vars;
		{controls_legend},button, button_group, close_button, slider_js, switch, add_controls_vars;
		{navigation_legend},overview, menu, dropdown_menu_js, drilldown_menu_js, accordion_menu_js, top_bar, responsive_navigation, magellan_js, pagination, breadcrumbs, add_navigation_vars;
		{containers_legend},accordion_js, callout, dropdown_js, media_object, offcanvas_js, reveal_js, add_containers_vars;
		{modal_legend},table, table_js, add_modal_vars;
		{media_legend},badge, flex_video, label, orbit_js, add_media_vars;
		{carousel_legend},progressbar, thumbnail, tooltip_js, add_carousel_vars;
		{plugins_legend},abide_pi, equilizer_pi, interchange_pi, toggler_pi, sticky_pi, add_plugins_vars;'
	),
		'subpalettes' 				=> array
	(
	
		'add_general_vars' => 'general_vars',
		'add_typography_vars' => 'typography_vars',
		'add_controls_vars' => 'controls_vars',
		'add_navigation_vars' => 'navigation_vars',
		'add_containers_vars' => 'containers_vars',
		'add_modal_vars' => 'modal_vars',
		'add_media_vars' => 'media_vars',
		'add_carousel_vars' => 'carousel_vars',
		'add_plugins_vars' => 'plugins_vars'
		
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),

		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		//
		'pid' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['pid'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['name'],
			'exclude'                 => true,
			'inputType'               => 'text',	
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'theme_folder' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['theme_folder'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_co_foundation_settings', 'getTemplateFolders'),
			'eval'                    => array('includeBlankOption'=>true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		// `-,-´ Colors
		'primary_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['primary_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['primary_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['primary_color']['pre_scss'],
			'exclude'                 => true,
			'default'            	=> '2ba6cb',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'secondary_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['secondary_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['secondary_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['secondary_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => 'e9e9e9',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858',
				'maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'alert_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['alert_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['alert_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['alert_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => 'c60f13',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'success_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['success_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['success_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['success_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => '5da423',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'body_font_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['body_font_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['body_font_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['body_font_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => '222222',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'header_font_color' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['header_font_color'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['header_font_color']['var_scss'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['header_font_color']['pre_scss'],
			'exclude'                 => true,
			'default'               => '222222',	
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'#8ab858','maxlength'=>6, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		// `-,-´ Text
		'text_direction' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['text_direction'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['text_direction']['var_scss'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			'default'               => 'ltr',	
			'options'               => array('ltr','rtl'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['text_direction_options'],
			'eval'                    => array('maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "char(16) NOT NULL default 'ltr'"
		),

		'icon_fonts' => array
		       (
		           'label'                 => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['icon_fonts'],
		           'exclude'               => true,
		          'inputType'               => 'fileTree',
		           'eval'                    => array('multiple'=>true, 'filesOnly'=>true,'fieldType'=>'checkbox'),
		           'sql'                   => "blob NULL"
		       ),  
		'fonts' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['fonts'],
			'exclude'               => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('multiple'=>true, 'filesOnly'=>true,'fieldType'=>'checkbox'),
			'sql'                   => "blob NULL"
		), 
		// `-,-´ grid cols,breakpoint,max_width,gap,radius
		'cols' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['cols'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['cols']['var_scss'],
			'exclude'                 => true,
			'default'				=>'12',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'12','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'breakpoint' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['breakpoint'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['breakpoint']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['breakpoint']['post_scss'],
			'exclude'                 => true,
			'default'				=>'58.75',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in em, e.g. 58.75','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'max_width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['max_width'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['max_width']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['max_width']['post_scss'],
			'exclude'                 => true,
			'default'				=>'62.5',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in em, e.g. 62.5','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		// `-,-´ Text
		'gap' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['gap'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['gap']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['gap']['post_scss'],
			'exclude'                 => true,
			'default'				=>'1.875',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in em, e.g. 1.875','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		// `-,-´ Fonts
		'radius' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['radius'],
			'var_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['radius']['var_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['radius']['post_scss'],
			'exclude'                 => true,
			'default'				=>'3',
			'inputType'               => 'text',	
			'eval'                    => array('placeholder'=>'value in px, e.g. 3','maxlength'=>32,'tl_class'=>'w50'),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		
		'typografie' => array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['typografie'],
					'exclude'                 => true,
					'default'               => '1',
					'inputType'               => 'checkbox',
					'eval'                    => array('tl_class'=>'clr w25'),
					'sql'                     => "char(1) NOT NULL default ''"
				),
		'typografie_vars' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['typografie_vars'],
			'pre_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['typografie_vars']['pre_scss'],
			'post_scss'                   => &$GLOBALS['TL_LANG']['tl_co_foundation_settings']['typografie_vars']['post_scss'],
			'exclude'                 => true,
			'default'				=>'
// TYPOGRAPHY
// $include-html-type-classes: $include-html-classes;
// We use these to control header font styles
// $header-font-family: $body-font-family;
// $header-font-weight: normal;
// $header-font-style: normal;
// $header-font-color: #222;
// $header-line-height: 1.4;
// $header-top-margin: .2rem;
// $header-bottom-margin: .5rem;
// $header-text-rendering: optimizeLegibility;

// We use these to control header font sizes
// $h1-font-size: rem-calc(44);
// $h2-font-size: rem-calc(37);
// $h3-font-size: rem-calc(27);
// $h4-font-size: rem-calc(23);
// $h5-font-size: rem-calc(18);
// $h6-font-size: 1rem;

// These control how subheaders are styled.
// $subheader-line-height: 1.4;
// $subheader-font-color: scale-color($header-font-color, $lightness: 35%);
// $subheader-font-weight: normal;
// $subheader-top-margin: .2rem;
// $subheader-bottom-margin: .5rem;

// A general <small> styling
// $small-font-size: 60%;
// $small-font-color: scale-color($header-font-color, $lightness: 35%);

// We use these to style paragraphs
// $paragraph-font-family: inherit;
// $paragraph-font-weight: normal;
// $paragraph-font-size: 1rem;
// $paragraph-line-height: 1.6;
// $paragraph-margin-bottom: rem-calc(20);
// $paragraph-aside-font-size: rem-calc(14);
// $paragraph-aside-line-height: 1.35;
// $paragraph-aside-font-style: italic;
// $paragraph-text-rendering: optimizeLegibility;

// We use these to style <code> tags
// $code-color: scale-color($alert-color, $lightness: -27%);
// $code-font-family: Consolas, "Liberation Mono", Courier, monospace;
// $code-font-weight: bold;

// We use these to style anchors
// $anchor-text-decoration: none;
// $anchor-text-decoration-hover: none;
// $anchor-font-color: $primary-color;
// $anchor-font-color-hover: scale-color($primary-color, $lightness: -14%);

// We use these to style the <hr> element
// $hr-border-width: 1px;
// $hr-border-style: solid;
// $hr-border-color: #ddd;
// $hr-margin: rem-calc(20);

// We use these to style lists
// $list-font-family: $paragraph-font-family;
// $list-font-size: $paragraph-font-size;
// $list-line-height: $paragraph-line-height;
// $list-margin-bottom: $paragraph-margin-bottom;
// $list-style-position: outside;
// $list-side-margin: 1.1rem;
// $list-ordered-side-margin: 1.4rem;
// $list-side-margin-no-bullet: 0;
// $list-nested-margin: rem-calc(20);
// $definition-list-header-weight: bold;
// $definition-list-header-margin-bottom: .3rem;
// $definition-list-margin-bottom: rem-calc(12);

// We use these to style blockquotes
// $blockquote-font-color: scale-color($header-font-color, $lightness: 35%);
// $blockquote-padding: rem-calc(9 20 0 19);
// $blockquote-border: 1px solid #ddd;
// $blockquote-cite-font-size: rem-calc(13);
// $blockquote-cite-font-color: scale-color($header-font-color, $lightness: 23%);
// $blockquote-cite-link-color: $blockquote-cite-font-color;

// Acronym styles
// $acronym-underline: 1px dotted #ddd;
// We use these to control padding and margin
// $microformat-padding: rem-calc(10 12);
// $microformat-margin: rem-calc(0 0 20 0);
// We use these to control the border styles
// $microformat-border-width: 1px;
// $microformat-border-style: solid;
// $microformat-border-color: #ddd;
// We use these to control full name font styles
// $microformat-fullname-font-weight: bold;
// $microformat-fullname-font-size: rem-calc(15);
// We use this to control the summary font styles
// $microformat-summary-font-weight: bold;
// We use this to control abbr padding
// $microformat-abbr-padding: rem-calc(0 1);
// We use this to control abbr font styles
// $microformat-abbr-font-weight: bold;
// $microformat-abbr-font-decoration: none;
',
			'inputType'               => 'textarea',	
			'eval'                    => array('maxlength'=>4000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
			'sql'                     => "text NULL"
		),
		/*
		*
		*****
		 COMPONENTS
		*****
		*/

		// `-,-´ checkboxes of used components
		'grid' 						=> createCheckboxArray('grid',false),
		'flex_grid' 				=> createCheckboxArray('flex_grid',false),
		'forms' 					=> createCheckboxArray('forms',false),
		'visibility_classes' 		=> createCheckboxArray('visibility_classes',false),
		'base_styles' 				=> createCheckboxArray('base_styles',false),
		'helper_classes' 			=> createCheckboxArray('helper_classes',false),
		'button' 					=> createCheckboxArray('button',false),
		'button_group' 				=> createCheckboxArray('button_group',false),
		'close_button' 				=> createCheckboxArray('close_button',false),
		'slider_js' 				=> createCheckboxArray('slider_js',false),
		'switch' 					=> createCheckboxArray('switch',false),
		'overview' 					=> createCheckboxArray('overview',false),
		'menu' 						=> createCheckboxArray('menu',false),
		'dropdown_menu_js' 			=> createCheckboxArray('dropdown_menu_js',false),
		'drilldown_menu_js' 		=> createCheckboxArray('drilldown_menu_js',false),
		'accordion_menu_js' 		=> createCheckboxArray('accordion_menu_js',false),
		'top_bar' 					=> createCheckboxArray('top_bar',false),
		'responsive_navigation' 	=> createCheckboxArray('responsive_navigation',false),
		'magellan_js' 				=> createCheckboxArray('magellan_js',false),
		'pagination' 				=> createCheckboxArray('pagination',false),
		'breadcrumbs' 				=> createCheckboxArray('breadcrumbs',false),
		'accordion_js' 				=> createCheckboxArray('accordion_js',false),
		'callout' 					=> createCheckboxArray('callout',false),
		'dropdown_js' 				=> createCheckboxArray('dropdown_js',false),
		'media_object' 				=> createCheckboxArray('media_object',false),
		'offcanvas_js' 				=> createCheckboxArray('offcanvas_js',false),
		'reveal_js' 				=> createCheckboxArray('reveal_js',false),
		'table' 					=> createCheckboxArray('table',false),
		'table_js' 					=> createCheckboxArray('table_js',false),
		'badge' 					=> createCheckboxArray('badge',false),
		'flex_video' 				=> createCheckboxArray('flex_video',false),
		'label' 					=> createCheckboxArray('label',false),
		'orbit_js' 					=> createCheckboxArray('orbit_js',false),
		'progressbar' 				=> createCheckboxArray('progressbar',false),
		'thumbnail' 				=> createCheckboxArray('thumbnail',false),
		'tooltip_js' 				=> createCheckboxArray('tooltip_js',false),

		// `-,-´ PlugIns
		'abide_pi' 					=> createCheckboxArray('abide_pi',false),
		'equilizer_pi' 				=> createCheckboxArray('equilizer_pi',false),
		'interchange_pi' 			=> createCheckboxArray('interchange_pi',false),
		'toggler_pi' 				=> createCheckboxArray('toggler_pi',false),
		'sticky_pi' 				=> createCheckboxArray('sticky_pi',false),


		// `-,-´ add variables checkboxes
		'add_general_vars' 		=> createCheckboxArray('add_general_vars',true),
		'add_typography_vars' 	=> createCheckboxArray('add_typography_vars',true),
		'add_controls_vars' 	=> createCheckboxArray('add_controls_vars',true),
		'add_navigation_vars' 	=> createCheckboxArray('add_navigation_vars',true),
		'add_containers_vars' 	=> createCheckboxArray('add_containers_vars',true),
		'add_modal_vars' 		=> createCheckboxArray('add_modal_vars',true),
		'add_media_vars' 		=> createCheckboxArray('add_media_vars',true),
		'add_carousel_vars' 	=> createCheckboxArray('add_carousel_vars',true),
		'add_plugins_vars' 		=> createCheckboxArray('add_plugins_vars',true),

		// `-,-´ Textareas with variables
		'general_vars' 		=> createTextareaArray(
								'general_vars',
								'true'
								),
		'typography_vars' 	=> createTextareaArray(
								'typography_vars',
								'true'
								),
		'controls_vars' 	=> createTextareaArray(
								'controls_vars',
								'true'
								),
		'navigation_vars' 	=> createTextareaArray(
								'navigation_vars',
								'true'
								),
		'containers_vars' 	=> createTextareaArray(
								'containers_vars',
								'true'
								),
		'modal_vars' 		=> createTextareaArray(
								'modal_vars',
								'true'
								),
		'media_vars' 		=> createTextareaArray(
								'media_vars',
								'true'
								),
		'carousel_vars' 	=> createTextareaArray(
								'carousel_vars',
								'true'
								),
		'plugins_vars' 		=> createTextareaArray(
								'plugins_vars',
								'true'
								)
	)
);

// `-,-´ Class tl_co_foundation_settings
class tl_co_foundation_settings extends Backend
{

	// `-,-´ Import the back end user object
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	// `-,-´ Return the link picker wizard
	public function pagePicker(DataContainer $dc)
	{
		return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}
	
	// `-,-´ Return all template folders as array
	public function getTemplateFolders()
	{
		return $this->doGetTemplateFolders('files');
	}
	
	// `-,-´ Return all template folders as array
	protected function doGetTemplateFolders($path, $level=0)
	{
		$return = array();

		foreach (scan(TL_ROOT . '/' . $path) as $file)
		{
			if (is_dir(TL_ROOT . '/' . $path . '/' . $file))
			{
				$return[$path . '/' . $file] = str_repeat(' &nbsp; &nbsp; ', $level) . $file;
				$return = array_merge($return, $this->doGetTemplateFolders($path . '/' . $file, $level+1));
			}
		}
		return $return;
	}
}
?>
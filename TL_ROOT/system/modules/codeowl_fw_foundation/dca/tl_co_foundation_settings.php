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
 
// `-,-´ Init default vars of framework 
$general_vars_default = '
// Globale
$global-font-size: 100%;
$global-width: rem-calc(1200);
$global-lineheight: 1.5;
$foundation-palette: (
  primary: #2199e8,
  secondary: #777,
  success: #3adb76,
  warning: #ffae00,
  alert: #ec5840,
);
$light-gray: #e6e6e6;
$medium-gray: #cacaca;
$dark-gray: #8a8a8a;
$black: #0a0a0a;
$white: #fefefe;
$body-background: $white;
$body-font-color: $black;
$body-font-family: \'Helvetica Neue\', Helvetica, Roboto, Arial, sans-serif;
$body-antialiased: true;
$global-margin: 1rem;
$global-padding: 1rem;
$global-weight-normal: normal;
$global-weight-bold: bold;
$global-radius: 0;
$global-text-direction: ltr;
$global-flexbox: false;
$print-transparent-backgrounds: true;

@include add-foundation-colors;

// Breakpoints

$breakpoints: (
  small: 0,
  medium: 640px,
  large: 1024px,
  xlarge: 1200px,
  xxlarge: 1440px,
);
$breakpoint-classes: (small medium large);

// The Grid

$grid-row-width: $global-width;
$grid-column-count: 12;
$grid-column-gutter: (
  small: 20px,
  medium: 30px,
);
$grid-column-align-edge: true;
$block-grid-max: 8;

// Forms

$fieldset-border: 1px solid $medium-gray;
$fieldset-padding: rem-calc(20);
$fieldset-margin: rem-calc(18 0);
$legend-padding: rem-calc(0 3);
$form-spacing: rem-calc(16);
$helptext-color: $black;
$helptext-font-size: rem-calc(13);
$helptext-font-style: italic;
$input-prefix-color: $black;
$input-prefix-background: $light-gray;
$input-prefix-border: 1px solid $medium-gray;
$input-prefix-padding: 1rem;
$form-label-color: $black;
$form-label-font-size: rem-calc(14);
$form-label-font-weight: $global-weight-normal;
$form-label-line-height: 1.8;
$select-background: $white;
$select-triangle-color: $dark-gray;
$select-radius: $global-radius;
$input-color: $black;
$input-placeholder-color: $medium-gray;
$input-font-family: inherit;
$input-font-size: rem-calc(16);
$input-background: $white;
$input-background-focus: $white;
$input-background-disabled: $light-gray;
$input-border: 1px solid $medium-gray;
$input-border-focus: 1px solid $dark-gray;
$input-shadow: inset 0 1px 2px rgba($black, 0.1);
$input-shadow-focus: 0 0 5px $medium-gray;
$input-cursor-disabled: not-allowed;
$input-transition: box-shadow 0.5s, border-color 0.25s ease-in-out;
$input-number-spinners: true;
$input-radius: $global-radius;

';

$typography_vars_default = '
// Base Typography

$header-font-family: $body-font-family;
$header-font-weight: $global-weight-normal;
$header-font-style: normal;
$font-family-monospace: Consolas, \'Liberation Mono\', Courier, monospace;
$header-sizes: (
  small: (
    \'h1\': 24,
    \'h2\': 20,
    \'h3\': 19,
    \'h4\': 18,
    \'h5\': 17,
    \'h6\': 16,
  ),
  medium: (
    \'h1\': 48,
    \'h2\': 40,
    \'h3\': 31,
    \'h4\': 25,
    \'h5\': 20,
    \'h6\': 16,
  ),
);
$header-color: inherit;
$header-lineheight: 1.4;
$header-margin-bottom: 0.5rem;
$header-text-rendering: optimizeLegibility;
$small-font-size: 80%;
$header-small-font-color: $medium-gray;
$paragraph-lineheight: 1.6;
$paragraph-margin-bottom: 1rem;
$paragraph-text-rendering: optimizeLegibility;
$code-color: $black;
$code-font-family: $font-family-monospace;
$code-font-weight: $global-weight-normal;
$code-background: $light-gray;
$code-border: 1px solid $medium-gray;
$code-padding: rem-calc(2 5 1);
$anchor-color: $primary-color;
$anchor-color-hover: scale-color($anchor-color, $lightness: -14%);
$anchor-text-decoration: none;
$anchor-text-decoration-hover: none;
$hr-width: $global-width;
$hr-border: 1px solid $medium-gray;
$hr-margin: rem-calc(20) auto;
$list-lineheight: $paragraph-lineheight;
$list-margin-bottom: $paragraph-margin-bottom;
$list-style-type: disc;
$list-style-position: outside;
$list-side-margin: 1.25rem;
$list-nested-side-margin: 1.25rem;
$defnlist-margin-bottom: 1rem;
$defnlist-term-weight: $global-weight-bold;
$defnlist-term-margin-bottom: 0.3rem;
$blockquote-color: $dark-gray;
$blockquote-padding: rem-calc(9 20 0 19);
$blockquote-border: 1px solid $medium-gray;
$cite-font-size: rem-calc(13);
$cite-color: $dark-gray;
$keystroke-font: $font-family-monospace;
$keystroke-color: $black;
$keystroke-background: $light-gray;
$keystroke-padding: rem-calc(2 4 0);
$keystroke-radius: $global-radius;
$abbr-underline: 1px dotted $black;

// Typography Helpers

$lead-font-size: $global-font-size * 1.25;
$lead-lineheight: 1.6;
$subheader-lineheight: 1.4;
$subheader-color: $dark-gray;
$subheader-font-weight: $global-weight-normal;
$subheader-margin-top: 0.2rem;
$subheader-margin-bottom: 0.5rem;
$stat-font-size: 2.5rem;

';

$controls_vars_default = '
// Button

$button-padding: 0.85em 1em;
$button-margin: 0 0 $global-margin 0;
$button-fill: solid;
$button-background: $primary-color;
$button-background-hover: scale-color($button-background, $lightness: -15%);
$button-color: $white;
$button-color-alt: $black;
$button-radius: $global-radius;
$button-sizes: (
  tiny: 0.6rem,
  small: 0.75rem,
  default: 0.9rem,
  large: 1.25rem,
);
$button-opacity-disabled: 0.25;

// Button Group

$buttongroup-margin: 1rem;
$buttongroup-spacing: 1px;
$buttongroup-child-selector: \'.button\';
$buttongroup-expand-max: 6;

// Close Button

$closebutton-position: right top;
$closebutton-offset-horizontal: 1rem;
$closebutton-offset-vertical: 0.5rem;
$closebutton-size: 2em;
$closebutton-lineheight: 1;
$closebutton-color: $dark-gray;
$closebutton-color-hover: $black;

// Slider

$slider-width-vertical: 0.5rem;
$slider-transition: all 0.2s ease-in-out;
$slider-height: 0.5rem;
$slider-background: $light-gray;
$slider-fill-background: $medium-gray;
$slider-handle-height: 1.4rem;
$slider-handle-width: 1.4rem;
$slider-handle-background: $primary-color;
$slider-opacity-disabled: 0.25;
$slider-radius: $global-radius;

// Switch

$switch-background: $medium-gray;
$switch-background-active: $primary-color;
$switch-height: 2rem;
$switch-height-tiny: 1.5rem;
$switch-height-small: 1.75rem;
$switch-height-large: 2.5rem;
$switch-radius: $global-radius;
$switch-margin: $global-margin;
$switch-paddle-background: $white;
$switch-paddle-offset: 0.25rem;
$switch-paddle-radius: $global-radius;
$switch-paddle-transition: all 0.25s ease-out;

';

$navigation_vars_default = '
// Accordion Menu

$accordionmenu-arrows: true;
$accordionmenu-arrow-color: $primary-color;

// Breadcrumbs

$breadcrumbs-margin: 0 0 $global-margin 0;
$breadcrumbs-item-font-size: rem-calc(11);
$breadcrumbs-item-color: $primary-color;
$breadcrumbs-item-color-current: $black;
$breadcrumbs-item-color-disabled: $medium-gray;
$breadcrumbs-item-margin: 0.75rem;
$breadcrumbs-item-uppercase: true;
$breadcrumbs-item-slash: true;

// Drilldown

$drilldown-transition: transform 0.15s linear;
$drilldown-arrows: true;
$drilldown-arrow-color: $primary-color;
$drilldown-background: $white;

// Dropdown Menu

$dropdownmenu-arrows: true;
$dropdownmenu-arrow-color: $anchor-color;
$dropdownmenu-min-width: 200px;
$dropdownmenu-background: $white;
$dropdownmenu-border: 1px solid $medium-gray;

// Menu

$menu-margin: 0;
$menu-margin-nested: 1rem;
$menu-item-padding: 0.7rem 1rem;
$menu-item-color-active: $white;
$menu-item-background-active: map-get($foundation-palette, primary);
$menu-icon-spacing: 0.25rem;

// Pagination

$pagination-font-size: rem-calc(14);
$pagination-margin-bottom: $global-margin;
$pagination-item-color: $black;
$pagination-item-padding: rem-calc(3 10);
$pagination-item-spacing: rem-calc(1);
$pagination-radius: $global-radius;
$pagination-item-background-hover: $light-gray;
$pagination-item-background-current: $primary-color;
$pagination-item-color-current: foreground($pagination-item-background-current);
$pagination-item-color-disabled: $medium-gray;
$pagination-ellipsis-color: $black;
$pagination-mobile-items: false;
$pagination-arrows: true;

// Top Bar

$topbar-padding: 0.5rem;
$topbar-background: $light-gray;
$topbar-submenu-background: $topbar-background;
$topbar-title-spacing: 1rem;
$topbar-input-width: 200px;
$topbar-unstack-breakpoint: medium;

// Title Bar

$titlebar-background: $black;
$titlebar-color: $white;
$titlebar-padding: 0.5rem;
$titlebar-text-font-weight: bold;
$titlebar-icon-color: $white;
$titlebar-icon-color-hover: $medium-gray;
$titlebar-icon-spacing: 0.25rem;

';

$containers_vars_default = '
// Accordion

$accordion-background: $white;
$accordion-plusminus: true;
$accordion-item-color: foreground($accordion-background, $primary-color);
$accordion-item-background-hover: $light-gray;
$accordion-item-padding: 1.25rem 1rem;
$accordion-content-background: $white;
$accordion-content-border: 1px solid $light-gray;
$accordion-content-color: foreground($accordion-content-background, $body-font-color);
$accordion-content-padding: 1rem;

// Callout

$callout-background: $white;
$callout-background-fade: 85%;
$callout-border: 1px solid rgba($black, 0.25);
$callout-margin: 0 0 1rem 0;
$callout-padding: 1rem;
$callout-font-color: $body-font-color;
$callout-font-color-alt: $body-background;
$callout-radius: $global-radius;
$callout-link-tint: 30%;

// Dropdown

$dropdown-padding: 1rem;
$dropdown-border: 1px solid $medium-gray;
$dropdown-font-size: 1rem;
$dropdown-width: 300px;
$dropdown-radius: $global-radius;
$dropdown-sizes: (
  tiny: 100px,
  small: 200px,
  large: 400px,
);

// Media Object

$mediaobject-margin-bottom: $global-margin;
$mediaobject-section-padding: $global-padding;
$mediaobject-image-width-stacked: 100%;

// Off-canvas

$offcanvas-size: 250px;
$offcanvas-background: $light-gray;
$offcanvas-zindex: -1;
$offcanvas-transition-length: 0.5s;
$offcanvas-transition-timing: ease;
$offcanvas-fixed-reveal: true;
$offcanvas-exit-background: rgba($white, 0.25);
$maincontent-class: \'off-canvas-content\';
$maincontent-shadow: 0 0 10px rgba($black, 0.5);

// Reveal

$reveal-background: $white;
$reveal-width: 600px;
$reveal-max-width: $global-width;
$reveal-padding: $global-padding;
$reveal-border: 1px solid $medium-gray;
$reveal-radius: $global-radius;
$reveal-zindex: 1005;
$reveal-overlay-background: rgba($black, 0.45);

';

$modal_vars_default = '
// Table

$table-background: $white;
$table-color-scale: 5%;
$table-border: 1px solid smart-scale($table-background, $table-color-scale);
$table-padding: rem-calc(8 10 10);
$table-hover-scale: 2%;
$table-row-hover: darken($table-background, $table-hover-scale);
$table-row-stripe-hover: darken($table-background, $table-color-scale + $table-hover-scale);
$table-striped-background: smart-scale($table-background, $table-color-scale);
$table-stripe: even;
$table-head-background: smart-scale($table-background, $table-color-scale / 2);
$table-foot-background: smart-scale($table-background, $table-color-scale);
$table-head-font-color: $body-font-color;
$show-header-for-stacked: false;

// Tabs

$tab-margin: 0;
$tab-background: $white;
$tab-background-active: $light-gray;
$tab-item-font-size: rem-calc(12);
$tab-item-background-hover: $white;
$tab-item-padding: 1.25rem 1.5rem;
$tab-expand-max: 6;
$tab-content-background: $white;
$tab-content-border: $light-gray;
$tab-content-color: foreground($tab-background, $primary-color);
$tab-content-padding: 1rem;

';

$media_vars_default = '
// Badge

$badge-background: $primary-color;
$badge-color: foreground($badge-background);
$badge-padding: 0.3em;
$badge-minwidth: 2.1em;
$badge-font-size: 0.6rem;

// Flex Video

$flexvideo-margin-bottom: rem-calc(16);
$flexvideo-ratio: 4 by 3;
$flexvideo-ratio-widescreen: 16 by 9;

// Label

$label-background: $primary-color;
$label-color: foreground($label-background);
$label-font-size: 0.8rem;
$label-padding: 0.33333rem 0.5rem;
$label-radius: $global-radius;

// Orbit

$orbit-bullet-background: $medium-gray;
$orbit-bullet-background-active: $dark-gray;
$orbit-bullet-diameter: 1.2rem;
$orbit-bullet-margin: 0.1rem;
$orbit-bullet-margin-top: 0.8rem;
$orbit-bullet-margin-bottom: 0.8rem;
$orbit-caption-background: rgba($black, 0.5);
$orbit-caption-padding: 1rem;
$orbit-control-background-hover: rgba($black, 0.5);
$orbit-control-padding: 1rem;
$orbit-control-zindex: 10;

';

$carousel_vars_default = '
// Progress Bar

$progress-height: 1rem;
$progress-background: $medium-gray;
$progress-margin-bottom: $global-margin;
$progress-meter-background: $primary-color;
$progress-radius: $global-radius;

// Thumbnail

$thumbnail-border: solid 4px $white;
$thumbnail-margin-bottom: $global-margin;
$thumbnail-shadow: 0 0 0 1px rgba($black, 0.2);
$thumbnail-shadow-hover: 0 0 6px 1px rgba($primary-color, 0.5);
$thumbnail-transition: box-shadow 200ms ease-out;
$thumbnail-radius: $global-radius;

// Tooltip

$has-tip-font-weight: $global-weight-bold;
$has-tip-border-bottom: dotted 1px $dark-gray;
$tooltip-background-color: $black;
$tooltip-color: $white;
$tooltip-padding: 0.75rem;
$tooltip-font-size: $small-font-size;
$tooltip-pip-width: 0.75rem;
$tooltip-pip-height: $tooltip-pip-width * 0.866;
$tooltip-radius: $global-radius;

';

$plugins_vars_default = '
// Abide

$abide-inputs: true;
$abide-labels: true;
$input-background-invalid: map-get($foundation-palette, alert);
$form-label-color-invalid: map-get($foundation-palette, alert);
$input-error-color: map-get($foundation-palette, alert);
$input-error-font-size: rem-calc(12);
$input-error-font-weight: $global-weight-bold;

';
/*
 * not implemented
 * // 23. Meter
// ---------

$meter-height: 1rem;
$meter-radius: $global-radius;
$meter-background: $medium-gray;
$meter-fill-good: $success-color;
$meter-fill-medium: $warning-color;
$meter-fill-bad: $alert-color;

 * 
 * */
// `-,-´  helper for dca container
function createCheckboxArray($name,$onchange){
	
	return  array
				(
					'label'                   		=> &$GLOBALS['TL_LANG']['tl_co_foundation_settings'][$name],
					'exclude'                	=> true,
					'default'               		=> ($onchange)?'':'1',
					'inputType'               	=> 'checkbox',
					'eval'                    		=> array('tl_class'=>'clr w25', 'submitOnChange' => $onchange),
					'sql'                     		=> ($onchange)?"char(1) NOT NULL default ''":"char(1) NOT NULL default '1'"
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
					'eval'                    		=> array('maxlength'=>4000,'tl_class'=>'w75','cols'=>30,'rows'=>4),
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
		
		{general_legend},grid, flex_grid, forms, input_range, visibility_classes, add_general_vars;		
		{typography_legend},text_direction,typography, add_typography_vars;
		{controls_legend},button, button_group, close_button, slider_js, switch, add_controls_vars;
		{navigation_legend},menu, menu_icon, dropdown_menu_js, drilldown_menu_js, accordion_menu_js, top_bar, title_bar, responsive_navigation, magellan_js, pagination, breadcrumbs, add_navigation_vars;
		{containers_legend},accordion_js, callout, dropdown_js, media_object, offcanvas_js, reveal_js, add_containers_vars;
		{modal_legend},table_fw, tabs_js, add_modal_vars;
		{media_legend},badge, flex_video, label, orbit_js, add_media_vars;
		{carousel_legend},progressbar, thumbnail, tooltip_js, add_carousel_vars;
		{plugins_legend},abide_pi, equalizer_pi, interchange_pi, toggler_pi, sticky_pi, add_plugins_vars;'
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
		'input_range' 					=> createCheckboxArray('input_range',false),
		'visibility_classes' 		=> createCheckboxArray('visibility_classes',false),
		//'base_styles' 				=> createCheckboxArray('base_styles',false),
		//'helper_classes' 			=> createCheckboxArray('helper_classes',false),
		'button' 					=> createCheckboxArray('button',false),
		'button_group' 				=> createCheckboxArray('button_group',false),
		'close_button' 				=> createCheckboxArray('close_button',false),
		'slider_js' 				=> createCheckboxArray('slider_js',false),
		'switch' 					=> createCheckboxArray('switch',false),
		'overview' 					=> createCheckboxArray('overview',false),
		'menu' 						=> createCheckboxArray('menu',false),
		'menu_icon' 						=> createCheckboxArray('menu_icon',false),
		'dropdown_menu_js' 			=> createCheckboxArray('dropdown_menu_js',false),
		'drilldown_menu_js' 		=> createCheckboxArray('drilldown_menu_js',false),
		'accordion_menu_js' 		=> createCheckboxArray('accordion_menu_js',false),
		'top_bar' 					=> createCheckboxArray('top_bar',false),
		'title_bar' 					=> createCheckboxArray('top_bar',false),
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
		'table_fw' 					=> createCheckboxArray('table_fw',false),
		'tabs_js' 					=> createCheckboxArray('tabs_js',false),
		'badge' 					=> createCheckboxArray('badge',false),
		'flex_video' 				=> createCheckboxArray('flex_video',false),
		'label' 					=> createCheckboxArray('label',false),
		'orbit_js' 					=> createCheckboxArray('orbit_js',false),
		'progressbar' 				=> createCheckboxArray('progressbar',false),
		'thumbnail' 				=> createCheckboxArray('thumbnail',false),
		'tooltip_js' 				=> createCheckboxArray('tooltip_js',false),

		// `-,-´ PlugIns
		'abide_pi' 					=> createCheckboxArray('abide_pi',false),
		'equalizer_pi' 				=> createCheckboxArray('equalizer_pi',false),
		'interchange_pi' 			=> createCheckboxArray('interchange_pi',false),
		'toggler_pi' 				=> createCheckboxArray('toggler_pi',false),
		'sticky_pi' 				=> createCheckboxArray('sticky_pi',false),


		// `-,-´ add variables checkboxes
		'add_general_vars' 		=> createCheckboxArray('add_general_vars',true),
		'add_typography_vars' => createCheckboxArray('add_typography_vars',true),
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
								$general_vars_default
								),
		'typography_vars' 	=> createTextareaArray(
								'typography_vars',
								$typography_vars_default
								),
		'controls_vars' 	=> createTextareaArray(
								'controls_vars',
								$controls_vars_default
								),
		'navigation_vars' 	=> createTextareaArray(
								'navigation_vars',
								$navigation_vars_default
								),
		'containers_vars' 	=> createTextareaArray(
								'containers_vars',
								$containers_vars_default
								),
		'modal_vars' 		=> createTextareaArray(
								'modal_vars',
								$modal_vars_default
								),
		'media_vars' 		=> createTextareaArray(
								'media_vars',
								$media_vars_default
								),
		'carousel_vars' 	=> createTextareaArray(
								'carousel_vars',
								$carousel_vars_default
								),
		'plugins_vars' 		=> createTextareaArray(
								'plugins_vars',
								$plugins_vars_default
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

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


$fieldsSize 	= count($GLOBALS['TL_DCA']['tl_content']['fields'])-1;

$default 		= '{type_legend},type,headline;';
$expert 		= '{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

// `-,-´ Add palettes for contentelements
array_insert($GLOBALS['TL_DCA']['tl_content']['palettes'], 0, array
(
	'orbit'        						        => $default.'{source_legend},multiSRC,sortBy,useHomeDir;{image_legend},size,numberOfItems;'.$expert,
	'orbit_start'        				      => $default.$expert,
	'orbit_start_inside'        	    => $default.$expert,
	'orbit_stop'        				      => $default.$expert,
	'orbit_stop_inside'        			  => $default.$expert,
	
	'clearing'            				    => $default.'{source_legend},multiSRC,sortBy,useHomeDir;{image_legend},size,co_fw_perRow,co_fw_fullsize,co_fw_perPage,co_fw_numberOfItems;'.$expert,
	
	'button_ftc'            			    => '{type_legend},type,co_fw_btn_name,co_fw_cta_href,co_fw_use_reveal;{button_legend},co_fw_btn_size,co_fw_btn_styles;'.$expert,
	'button_bar_start_ftc'          	=> $default.$expert,
	'button_bar_stop_ftc'           	=> '{type_legend},type;'.$expert,
	'button_group'            			  => '{type_legend},type;{dropdown_legend},co_fw_list_links;{button_legend},co_fw_btn_size,co_fw_btn_styles;'.$expert,
	
	'dropdown_buttons'            		=> '{type_legend},type,co_fw_btn_name;{dropdown_legend},co_fw_list_links,co_fw_drop_align;{button_legend},co_fw_btn_size,co_fw_btn_styles,co_fw_btn_split,co_fw_btn_hover;'.$expert,
	'dropdown_buttons_content_start'  => '{ftc_legend},co_fw_small_ftc,co_fw_large_ftc,co_fw_float_ftc,co_fw_align_ftc;{type_legend},type,co_fw_btn_name,co_fw_drop_align;{button_legend},co_fw_btn_size,co_fw_btn_styles,co_fw_btn_split,co_fw_btn_hover;'.$expert,
	'dropdown_buttons_content_stop'   => '{type_legend},type;'.$expert,
	
	'joyride'           				      => '{type_legend},type;{joyride_legend},co_fw_joyride;'.$expert,
	'alert_box'            				    => '{type_legend},type;{alert_legend},co_fw_alert_kind,co_fw_alert_style,co_fw_alert_txt;'.$expert,
	'reveal_modal_start'            	=> '{type_legend},type;'.$expert,
	'reveal_modal_stop'            		=> '{type_legend},type;'.$expert,
	
	'magellan_stop'            			  => $default.$expert,
	'magellan_nav'            			  => '{type_legend},type;{magellan_legend},co_fw_magellan_nav;'.$expert,

	'blockquote'            			    => $default.'{blockquote_legend},co_fw_blockquote,co_fw_cite;'.$expert,
	'vcard'            					      => $default.'{vcard_legend},co_fw_vcard;'.$expert,
	'def_list'            				    => $default.'{list_legend},co_fw_def_list;'.$expert,
	
	'progress_bar'            			  => '{type_legend},type,co_fw_progress_size,co_fw_btn_styles;'.$expert,
	
	'tab_ftc_start'  					        => $default.'{nav_legend},co_fw_tabs_nav,co_fw_tabs_align;'.$expert,
	'tab_ftc_stop'   					        => '{type_legend},type;'.$expert,
	'tab_ftc_start_inside'  			    => '{type_legend},type;'.$expert,
	'tab_ftc_stop_inside'   			    => '{type_legend},type;'.$expert,
	
	'acc_ftc_start'  					        => $default.$expert,
	'acc_ftc_stop'   					        => '{type_legend},type;'.$expert,
	'acc_ftc_start_inside'  			    => $default.$expert,
	'acc_ftc_stop_inside'   			    => '{type_legend},type;'.$expert,
	'price_table'        				      => $default.'{table_legend},co_fw_price_table,co_fw_cta_href;'.$expert,
	
	'flex_video'        				      => $default.'{video_legend},co_fw_use_youtube,co_fw_vimeo,co_fw_own_src;'.$expert,
	'placeholder_image'               => $default.'{placeholder_legend},co_fw_is_bw,co_fw_stamp,co_fw_topic;{image_legend},alt,title,size,imagemargin,imageUrl,caption;'.$expert,

  ));
  
  // `-,-´ Selector
  array_insert($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'] ,1,array('co_fw_use_reveal','co_fw_use_youtube','co_fw_vimeo','co_fw_own_src')); 
  // `-,-´ Add subpalletes
  //var_dump($GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__']);
  $subpalettes = $GLOBALS['TL_DCA']['tl_content']['subpalettes'];
  $subpalettesSize=count($subpalettes)-1;
  // `-,-´ Add subpalettes for contentelements
  array_insert($GLOBALS['TL_DCA']['tl_content']['subpalettes'], $subpalettesSize, array
  (
  	'co_fw_use_reveal'         => 'co_fw_modal_id',
  	'co_fw_use_youtube'        => 'playerSize,autoplay,co_fw_youtube_vimeo_id',
  	'co_fw_vimeo'              => 'playerSize,autoplay,co_fw_youtube_vimeo_id',
  	'co_fw_own_src'            => 'playerSize,autoplay,posterSRC,co_fw_video_src,co_fw_track_src,co_fw_flash_player_src,co_fw_flash_video_src'
  ));
  
array_insert($GLOBALS['TL_DCA']['tl_content']['fields'], $fieldsSize, array
(

// `-,-´ Tabs
'co_fw_tabs_nav' => array
     (
         'label'                 => &$GLOBALS['TL_LANG']['tl_content']['co_fw_tabs_nav'],
         'exclude'               => true,
         'inputType'             => 'multiColumnWizard',
         'eval' => array
         (
             'tl_class'          => 'clr',
             'columnFields' => array
             (
                 'value' => array
                 (
                     'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_tabs_nav']['value'],
                     'inputType' => 'text',
                     'eval'      => array('class'=>'tl_text_2'),
                 ),
                 'label' => array
                 (
                     'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_tabs_nav']['label'],
                     'inputType' => 'text',
                     'eval'      => array('class'=>'tl_text_2'),
                 ),
                 'is_active' => array
                 (
                     'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_tabs_nav']['is_active'],
                     'inputType' => 'checkbox',
                     'eval'      => array('columnPos'=>2),
                 )
             ),
         ),
         'sql'                   => "blob NULL",
     ),
     
'co_fw_tabs_align' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_tabs_align'],
   			'default'                 => '',
   			'options'=>array('horizontal','vertical'),
   			'exclude'                 => true,
   		
   			'inputType'               => 'select',
  
   			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_tabs_align_options'],
   			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   			'sql'                     => "varchar(255) NOT NULL default ''"
   		),
// `-,-´ Liststyle
'co_fw_list_style_type' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_list_style_type'],
   			'default'                 => '',
   			'options'=>array(' ','no-bullet', 'square', 'circle','disc'),
   			'exclude'                 => true,

   			'inputType'               => 'select',
  
   			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_list_style_type_options'],
   			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   			'sql'                     => "varchar(255) NOT NULL default ''"
   		),
// `-,-´ Definition List  
  'co_fw_def_list' => array
     		(
     			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_def_list'],
     		'exclude'               => true,
     		    'inputType'             => 'multiColumnWizard',
     		    'eval' => array
     		    (
     		        'tl_class'          => 'clr',
     		        'columnFields' => array
     		        (
     		            'title' => array
     		            (
     		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_def_list']['title'],
     		                'inputType' => 'text',
     		                'eval'      => array('class'=>'tl_text_3'),
     		            ),
     		            'definition' => array
     		            (
     		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_def_list']['definition'],
     		                'inputType' => 'textarea',
     		                'eval'      => array('class'=>'tl_text_2'),
     		            ),
     		            'class' => array
     		            (
     		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_def_list']['class'],
     		                'inputType' => 'text',
     		                'eval'      => array('class'=>'tl_text_3'),
     		            )
     		        ),
     		    ),
     		    'sql'                   => "blob NULL",
     		), 
// `-,-´ Price Table 
     'co_fw_price_table' => array
        		(
        			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_price_table'],
        		'exclude'               => true,
        		'default'=>'a:7:{i:0;a:2:{s:7:"content";s:16:"Foundation Theme";s:5:"class";s:5:"title";}i:1;a:2:{s:7:"content";s:10:"199,99 €";s:5:"class";s:5:"price";}i:2;a:2:{s:7:"content";s:11:"Top Angebot";s:5:"class";s:11:"description";}i:3;a:2:{s:7:"content";s:20:"5 Responsive Layouts";s:5:"class";s:11:"bullet-item";}i:4;a:2:{s:7:"content";s:20:"20 erweiterte Module";s:5:"class";s:11:"bullet-item";}i:5;a:2:{s:7:"content";s:3:"...";s:5:"class";s:11:"bullet-item";}i:6;a:2:{s:7:"content";s:17:"Angebot anfordern";s:5:"class";s:10:"cta-button";}}',
        		    'inputType'             => 'multiColumnWizard',
        		    'eval' => array
        		    (
        		        'tl_class'          => 'clr',
        		        'columnFields' => array
        		        (
        		           
        		            'content' => array
        		            (
        		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_price_table']['content'],
        		                'inputType' => 'textarea',
        		                'eval'      => array('class'=>'tl_text_2'),
        		            ),
        		            'class' => array
        		            (
        		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_price_table']['class'],
        		                'inputType' => 'text',
        		                'eval'      => array('class'=>'tl_text_3'),
        		            )
        		        ),
        		    ),
        		    'sql'                   => "blob NULL",
        		),
        'co_fw_cta_href' => array
        (
        	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_cta_href'],
        	//'exclude'                 => true,
        	'search'                  => true,
        	'inputType'               => 'text',
        	'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
        	'wizard' => array
        	(
        		array('tl_content_foundation', 'pagePicker')
        	),
        		'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        
        // `-,-´ Buttonlist or Linklist
        'co_fw_btn_name' => array
        (
        	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_name'],
        	//'exclude'                 => true,
        	'search'                  => true,
        	'inputType'               => 'text',
        	'eval'                    => array('rgxp'=>'extnd', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 '),
        	
        		'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'co_fw_list_links' => array
           		(
           			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_list_links'],
           		'exclude'               => true,
           		'default'=>'',
           		    'inputType'             => 'multiColumnWizard',
           		    'eval' => array
           		    (
           		        'tl_class'          => 'clr',
           		        'columnFields' => array
           		        (
           		           
           		            'content' => array
           		            (
           		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_list_links']['content'],
           		                'inputType' => 'text',
           		                'eval'      => array('class'=>'tl_text_2'),
           		            ),
           		            'href' => array
           		            (
           		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_list_links']['href'],
           		                'inputType' => 'text',
           		                'eval'      => array('class'=>'tl_text_3','rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50 wizard'),
           		                'wizard' => array
           		                (
           		                	array('tl_content_foundation', 'pagePicker')
           		                )
           		            ),
           		            'class' => array
           		            (
           		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_list_links']['class'],
           		                'inputType' => 'text',
           		                'eval'      => array('class'=>'tl_text_3'),
           		            )
           		        ),
           		    ),
           		    'sql'                   => "blob NULL",
           		),
// `-,-´ Buttons settings
'co_fw_btn_size' => array
   		(
   			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_size'],
   			'default'                 => '',
   			'options'=>array(' ','tiny','small','large'),
   			'exclude'                 => true,
   		
   			'inputType'               => 'select',
  
   			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_size_options'],
   			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
   			'sql'                     => "varchar(255) NOT NULL default ''"
   		),
  'co_fw_btn_styles' => array
     		(
     			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_styles'],
     			'default'                 => '',
     			'options'=>array(' ','alert','success','secondary','radius','round','disabled','expand'),
     			'exclude'                 => true,
     			
     			'inputType'               => 'select',
    
     			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_styles_options'],
     			'eval'                    => array('multiple'=>true,'helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50 m12'),
     			'sql'                     => "varchar(255) NOT NULL default ''"
     		),
     'co_fw_btn_split' => array
     (
     	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_split'],
     	'exclude'                 => true,
     	'inputType'               => 'checkbox',
     	'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50 clr'),
     	'sql'                     => "char(1) NOT NULL default ''"
     ),
// `-,-´ Dropdown
   'co_fw_drop_align' => array
      		(
      			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_drop_align'],
      			'default'                 => '',
      			'options'=>array(' ','top','down','left','right'),
      			'exclude'                 => true,
      		
      			'inputType'               => 'select',
    
      			'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_drop_align_options'],
      			'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
      			'sql'                     => "varchar(255) NOT NULL default ''"
      		),  
// `-,-´ open modal with btn
      'co_fw_use_reveal' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_use_reveal'],
      	'exclude'                 => true,
      	'inputType'               => 'checkbox',
      	'eval'                    => array('submitOnChange'=>true),
      	'sql'                     => "char(1) NOT NULL default ''"
      ),
      'co_fw_modal_id' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_modal_id'],
      	'exclude'                 => true,
      	'inputType'               => 'text',
      	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
      	'sql'                     => "varchar(255) NOT NULL default ''"
      ),
      'co_fw_alert_kind' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_alert_kind'],
      		'default'                 => '',
      		'options'=>array('info','secondary','success','warning','alert'),
      		'exclude'                 => true,
      	
      		'inputType'               => 'select',
  
      		'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_alert_kind'],
      		'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
      		'sql'                     => "varchar(64) NOT NULL default ''"
      ),
      'co_fw_alert_style' => array
      (
         'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_alert_style'],
         	'default'                 => '',
         	'options'=>array(' ','round','radius'),
         	'exclude'                 => true,
         
         	'inputType'               => 'select',
        
         	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_alert_style'],
         	'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
         	'sql'                     => "varchar(64) NOT NULL default ''"
      ),
      'co_fw_alert_txt' => array
      (
      	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_name'],
      	//'exclude'                 => true,
      	'search'                  => true,
      	'inputType'               => 'textarea',
      	'eval'                    => array( 'decodeEntities'=>true, 'maxlength'=>2000, 'tl_class'=>'clr long m12'),
      	
      		'sql'                     => "varchar(2000) NOT NULL default ''"
      ),
      
// `-,-´ joyride
      'co_fw_joyride' => array
             (
                 'label'                 => &$GLOBALS['TL_LANG']['tl_content']['co_fw_joyride'],
                 'exclude'               => true,
                 'inputType'             => 'multiColumnWizard',
                 'default' =>'a:3:{i:0;a:5:{s:2:"id";s:7:"btn_480";s:5:"class";s:0:"";s:3:"txt";s:5:"Start";s:7:"content";s:34:"<h4>#Stop1</h4><p>Some Content</p>";s:7:"options";s:35:"tip_location:top;tip_animation:fade";}i:1;a:5:{s:2:"id";s:10:"article-68";s:5:"class";s:5:"alert";s:3:"txt";s:10:"Next Modal";s:7:"content";s:34:"<h4>#Stop2</h4><p>Some Content</p>";s:7:"options";s:64:"tip_location:left;tip_animation:fade; expose_add_class : \'alert\'";}i:2;a:5:{s:2:"id";s:10:"article-70";s:5:"class";s:0:"";s:3:"txt";s:3:"End";s:7:"content";s:34:"<h4>#Stop3</h4><p>Some Content</p>";s:7:"options";s:18:"tip_location:right";}}',
                 'eval' => array
                 (
                     'tl_class'          => 'clr ',
                     'columnFields' => array
                     (
                         'id' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_joyride']['id'],
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_3'),
                             
                         ),
                    
                         'txt' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_joyride']['txt'],
                             
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_3'),
                             
                         ),
                         'content' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_joyride']['content'],
                             
                             'inputType' => 'textarea',
                             'eval'      => array('allowHtml'=>true,'class'=>'tl_text_1'),
                             
                         ),
                         'options' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_joyride']['options'],
                             
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_2','allowHtml'=>true),
                             
                         )
                         
                     ),
                 ),
                 'sql'                   => "blob NULL",
             ), 
     'co_fw_btn_hover' => array
     (
     	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_btn_hover'],
     	'exclude'                 => true,
     	'inputType'               => 'checkbox',
     	'eval'                    => array('submitOnChange'=>false, 'tl_class'=>'w50'),
     	'sql'                     => "char(1) NOT NULL default ''"
     ),
// `-,-´ Blockquote
    'co_fw_blockquote' => array
    (
    	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_blockquote'],
    	'exclude'                 => true,
    	'inputType'               => 'textarea',
    	'eval'                    => array('maxlength'=>2000, 'tl_class'=>'long'),
    	'sql'                     => "varchar(2000) NOT NULL default ''"
    ),
    'co_fw_cite' => array
    (
    	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_cite'],
    	'exclude'                 => true,
    	'inputType'               => 'text',
    	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
    	'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    
// `-,-´ VCard
    'co_fw_vcard' => array
       		(
       			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_vcard'],
       		'exclude'               => true,
       		'default'=>'a:6:{i:0;a:2:{s:7:"content";s:17:"Monique Hahnefeld";s:5:"class";s:2:"fn";}i:1;a:2:{s:7:"content";s:26:"Friedrich-Karl-Straße 20A";s:5:"class";s:14:"street-address";}i:2;a:2:{s:7:"content";s:6:"Berlin";s:5:"class";s:8:"locality";}i:3;a:2:{s:7:"content";s:6:"Berlin";s:5:"class";s:5:"state";}i:4;a:2:{s:7:"content";s:5:"12103";s:5:"class";s:3:"zip";}i:5;a:2:{s:7:"content";s:25:"info@monique-hahnefeld.de";s:5:"class";s:5:"email";}}',
       		    'inputType'             => 'multiColumnWizard',
       		    'eval' => array
       		    (
       		        'tl_class'          => 'clr',
       		        'columnFields' => array
       		        (
       		           
       		            'content' => array
       		            (
       		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_vcard']['content'],
       		                'inputType' => 'textarea',
       		                'eval'      => array('class'=>'tl_text_2'),
       		            ),
       		            'class' => array
       		            (
       		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_vcard']['class'],
       		                'inputType' => 'text',
       		                'eval'      => array('class'=>'tl_text_3'),
       		            )
       		        ),
       		    ),
       		    'sql'                   => "blob NULL",
       		),
// `-,-´ Video	
      'co_fw_video_src' => array
             (
                 'label'                 => &$GLOBALS['TL_LANG']['tl_content']['co_fw_video_src'],
                 'exclude'               => true,
                 'inputType'             => 'multiColumnWizard',
                 'default' =>'a:3:{i:0;a:2:{s:4:"mime";s:9:"video/mp4";s:3:"src";s:0:"";}i:1;a:2:{s:4:"mime";s:9:"video/ogg";s:3:"src";s:0:"";}i:2;a:2:{s:4:"mime";s:10:"video/webm";s:3:"src";s:0:"";}}',
                 'eval' => array
                 (
                     'tl_class'          => 'clr ',
                     'columnFields' => array
                     (
                         'mime' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_video_src']['mime'],
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_3'),
                         ),
                         'src' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_video_src']['src'],
                             'inputType'               => 'fileTree',
                             'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'tl_text_1'),
                           
                         )
                     ),
                 ),
                 'sql'                   => "blob NULL",
             ),
      'co_fw_track_src' => array
             (
                 'label'                 => &$GLOBALS['TL_LANG']['tl_content']['co_fw_track_src'],
                 'exclude'               => true,
                 'inputType'             => 'multiColumnWizard',
                 'default' =>'a:2:{i:0;a:3:{s:4:"kind";s:8:"captions";s:3:"src";s:0:"";s:4:"lang";s:2:"de";}i:1;a:3:{s:4:"kind";s:8:"captions";s:3:"src";s:0:"";s:4:"lang";s:2:"en";}}',
                 'eval' => array
                 (
                     'tl_class'          => 'clr ',
                     'columnFields' => array
                     (
                         'kind' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_track_src']['kind'],
                             'inputType' => 'select',
                             'options'=>array('captions',
                             'chapters',
                            'descriptions',
                             'metadata',
                             'subtitles'),
                             'eval'      => array('class'=>'tl_text_2'),
                             	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_track_src_options'],
                         ),
                         'src' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_track_src']['src'],
                             'inputType'               => 'fileTree',
                             'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'tl_text_1'),
                           
                         ),
                         'lang' => array
                         (
                             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_track_src']['lang'],
                             'inputType' => 'text',
                             'eval'      => array('class'=>'tl_text_4'),
                         ),
                     ),
                 ),
                 'sql'                   => "blob NULL",
             ),  
             
         'co_fw_flash_player_src' => array
         (
             'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_flash_player_src'],
             'exclude'                 => true,
             'inputType'               => 'fileTree',
             'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'w50'),
             'sql'                     => "binary(16) NULL"
           
         ), 
        'co_fw_flash_video_src' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_flash_video_src'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio',  'tl_class'=>'w50'),
            'sql'                     => "binary(16) NULL"
          
        ), 
// `-,-´ Flexvideo
    	'co_fw_youtube_vimeo_id' => array
    	(
    		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_youtube_vimeo_id'],
    		'exclude'                 => true,
    		'inputType'               => 'text',
    		'eval'                    => array('rgxp'=>'url', 'mandatory'=>true),
    		'sql'                     => "varchar(16) NOT NULL default ''"
    	),
       'co_fw_use_youtube' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_use_youtube'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'co_fw_vimeo' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_vimeo'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'co_fw_own_src' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_own_src'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'co_fw_progress_size' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_progress_size'],
       	'exclude'                 => true,
       	'inputType'               => 'text',
       	'eval'                    => array('placeholder'=>'1-100%','maxlength'=>32, 'tl_class'=>'clr w50'),
       	'sql'                     => "varchar(32) NOT NULL default ''"
       ),
// `-,-´ Placeholder
       'co_fw_is_bw' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_is_bw'],
       	'exclude'                 => true,
       	'inputType'               => 'checkbox',
       	'eval'                    => array('submitOnChange'=>true),
       	'sql'                     => "char(1) NOT NULL default ''"
       ),
       'co_fw_stamp' => array
       (
       	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_stamp'],
       	'exclude'                 => true,
       	'inputType'               => 'text',
       	'eval'                    => array('placeholder'=>'designs2','maxlength'=>255, 'tl_class'=>'clr w50'),
       	'sql'                     => "varchar(255) NOT NULL default 'designs2'"
       ),
       'co_fw_topic' => array
       (
          'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_topic'],
          	'default'                 => '',
          	'options'=>array(' ','abstract','animals','business','cats','city','food','night','life','fashion','people','nature','sports','technics','transport'),
          	'exclude'                 => true,
          	'inputType'               => 'select',
         
          	'reference'               => &$GLOBALS['TL_LANG']['tl_content']['co_fw_topic_options'],
          	'eval'                    => array('helpwizard'=>false, 'chosen'=>false, 'submitOnChange'=>false, 'tl_class'=>'w50'),
          	'sql'                     => "varchar(64) NOT NULL default ''"
       ),
       // `-,-´ Magellan 
       'co_fw_magellan_nav' => array
          		(
          			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['co_fw_magellan_nav'],
          		'exclude'               => true,
          		'default'=>'',
          		    'inputType'             => 'multiColumnWizard',
          		    'eval' => array
          		    (
          		        'tl_class'          => 'clr',
          		        'columnFields' => array
          		        (
          		           'alias' => array
          		           (
          		               'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_magellan_nav']['alias'],
          		               'inputType' => 'text',
          		               'eval'      => array('class'=>'tl_text_3'),
          		           ),
          		            'content' => array
          		            (
          		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_magellan_nav']['content'],
          		                'inputType' => 'text',
          		                'eval'      => array('class'=>'tl_text_2'),
          		            ),
          		            'class' => array
          		            (
          		                'label'     => &$GLOBALS['TL_LANG']['tl_content']['co_fw_magellan_nav']['class'],
          		                'inputType' => 'text',
          		                'eval'      => array('class'=>'tl_text_3'),
          		            )
          		        ),
          		    ),
          		    'sql'                   => "blob NULL",
          		)
	  ));
	 $GLOBALS['TL_DCA']['tl_content']['fields']['playerSize']['default']='a:2:{i:0;s:3:"640";i:1;s:3:"480";}';
	 $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback']   = array('tl_content_foundation', 'addCteType');
	  
class tl_content_foundation extends \tl_content
{	  
	 
	  // `-,-´ pagepicker
	  public function pagePicker(DataContainer $dc)
	  {
	  	return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $dc->value) . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	  }
	   

    // `-,-´ Add the type of content element
		public function addCteType($arrRow)
		{
			$key = $arrRow['invisible'] ? 'unpublished' : 'published';
			$type = $GLOBALS['TL_LANG']['CTE'][$arrRow['type']][0] ?: '&nbsp;';
			$class = 'limit_height';
			$data= '';
			$headline=unserialize($arrRow['headline']);
			$CssID= unserialize($arrRow['cssID']);
			$CssClass= ' ce_'.$arrRow['type'].' '.$CssID[1].' '.$arrRow['small_ftc'].' '.$arrRow['large_ftc'].' '.$arrRow['float_ftc'].' '.$this->splitArr($arrRow['align_ftc']).' ';
			
			if (!in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop'])){
			
				$data .=  '<span class="data" > ';
				
				if ($arrRow['data_attr']==''&&$arrRow['row_data_attr_ftc']=='') {
				}else {
				//	$data .=  'ATTR: '.$this->splitArr($arrRow['data_attr']).' '.$this->splitArr($arrRow['row_data_attr_ftc']).' |';
				}
				if ($CssID[0]!==''){				
				//	$data .= ' ID: '.$CssID[0].' |';
				}
				
			//	$data .= ' CLASS: '.$CssClass;
				
				$data .='</span>';
			}else {
				$headline['value']='';
			}
			// `-,-´  Remove the class if it is a wrapper element
			if (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['start']) || in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['separator']) || in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop']))
			{
				$class = '';
	
				if (($group = $this->getContentElementGroup($arrRow['type'])) !== null)
				{
					$type = $GLOBALS['TL_LANG']['CTE'][$group] . ' ' . $type . ' ';
				}
			}
	
			// `-,-´  Add the group name if it is a single element (see #5814)
			elseif (in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['single']))
			{
				if (($group = $this->getContentElementGroup($arrRow['type'])) !== null)
				{
					$type = $GLOBALS['TL_LANG']['CTE'][$group] . ' ' . $type . ' ';
				}
			}
	
			// `-,-´  Add the ID of the aliased element
			if ($arrRow['type'] == 'alias')
			{
				$type .= ' ID ' . $arrRow['cteAlias'];
			}
	
			// `-,-´  Add the protection status
			if ($arrRow['protected'])
			{
				$type .= ' ' . $GLOBALS['TL_LANG']['MSC']['protected'] . ' ';
			}
			elseif ($arrRow['guests'])
			{
				$type .= ' ' . $GLOBALS['TL_LANG']['MSC']['guests'] . ' ';
			}
	
			// Add the headline level (see #5858)
			if ($arrRow['type'] == 'headline')
			{
				if (is_array(($headline = deserialize($arrRow['headline']))))
				{
					$type .= ' ' . $headline['unit'] . ' ';
				}
			}
	
			// `-,-´  Limit the element's height
			if (!Config::get('doNotCollapse'))
			{
				$class .=  ' h64';
			}
//	var_dump($arrRow);
//	exit;  <div class="' . trim($class) . '">'.$data.'<span class="headline">'.$headline['value'].'</span>
			return '
	<div class="cte_type ' . $key . $CssClass.'">' . $type . '</div>
 <div class="' . trim($class) . '">
	' . $this->getContentElement($arrRow['id']) . '
	</div>' . "\n";
		}
	
	public function splitArr($arr){
	$str='';
		if ($arr==''||!is_array(unserialize($arr))) {
			return;
		}
		foreach (unserialize($arr) as $class) {
			$str.=' '.$class;
		}
		return $str;
	}
	  
	  
}
	  ?>
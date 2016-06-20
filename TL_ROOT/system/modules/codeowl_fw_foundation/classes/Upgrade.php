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

namespace Codeowl;

class Upgrade extends \System
{

   
    public function run()
    {
        	
		$arrTables = array(
            'tl_co_foundation_settings'
            );
        foreach ($arrTables as $table) {
            if (\Database::getInstance()->tableExists($table)) {
                $this->updateFieldNames();
            }
        }
		
       // RequestCache::purge();
		
		
	}
	public function updateFieldNames(){
		
		// `-,-´ table => fields[old => new]
		$arrFields = array();
		$arrFields['tl_layout'] = array(
			'use_offcanvas' 	=> 'co_fw_use_offcanvas',
			'addFoundation' 	=> 'co_fw_add_foundation'
		);
		$newPrefix = 'co_fw_';
		$arrFieldsOnlyAddPrefix = array();
		$arrFieldsOnlyAddPrefix['tl_form_field'] = array(
			'rs_classes',
		   	'rs_show_value',
		   	'rs_start',
		   	'rs_end',
		   	'rs_step',
		   	'rs_unity'
		);
		$arrFieldsOnlyAddPrefix['tl_content'] = array(
			'tabs_nav', 
			'tabs_align',
			'list_style_type',
	  		'def_list', 
	     	'price_table',
	        'cta_href',
	        'btn_name',
	        'list_links',
			'btn_size',
	  		'btn_styles',
	     	'btn_split',
	   		'drop_align',  
		    'use_reveal',
		    'modal_id',
		    'alert_kind',
		    'alert_style',
		    'alert_txt',
		    'joyride', 
		    'btn_hover',
		    'blockquote',
		    'cite',
		    'vcard',
	      	'video_src',
	      	'track_src',   
	        'flash_player_src', 
	        'flash_video_src', 
	    	'youtube_vimeo_id',
	       	'use_youtube',
	       	'vimeo',
	       	'own_src',
	       	'progress_size',
	       	'is_bw',
	       	'stamp',
	       	'topic',
	       	'magellan_nav'		     
		);
		$arrFieldsOnlyAddPrefix['tl_module'] = array(
			'dropdown_level',
			'topbar_options',
			'topbar_locate',
			'offcanvas_align',
			'top_bar',
			'top_bar_left' ,
			'top_bar_right' 
		);
		
		foreach ($arrFields as $table => $fields){
			foreach ($fields as $oldField => $newField) {
	                $this->renameField($table,$oldField,$newField);    
	        }
		}
		
		foreach ($arrFieldsOnlyAddPrefix as $table => $fields){
			foreach ($fields as $field) {
	                $this->renameField($table,$field,$newPrefix.$field);    
	        }
		}

     
    }
	public function renameField($table,$oldField,$newField){
		$db = \Database::getInstance();
		  if ($db->fieldExists($oldField,$table)) {
			$info = $db->execute("SHOW FIELDS FROM $table where Field ='$oldField'");
			if(NULL==$info){continue;}
			$arrInfo = $info->row();
			$arrInfo['Null'] = ($arrInfo['Null'] == 'NO') ? 'NOT NULL' : 'NULL';
			$strAttributes =  $arrInfo['Type']. ' '.$arrInfo['Null'];

		  	$db->execute("ALTER TABLE $table CHANGE $oldField $newField $strAttributes");	
		  }	
	}

}

<?php
/** 
 * Extension for Contao Open Source CMS
 *
 * Copyright (C) 2015 Monique Hahnefeld
 *
 * @package codeowl_grid_control
 * @author  Monique Hahnefeld <info@monique-hahnefeld.de>
 * @link    http://codeowl.org
 * @license LGPLv3
 *
 * `-,-´
 *	( )  codeowl.org
 *************************/

namespace Codeowl;


class Themes extends \Backend
{

		
	public function generate($dc) 
	{
		$Rel 			= 'id';
		$SettingsModel 	= new FoundationSettingsModel;
		$SettingsArr    = $SettingsModel->getSettings($Rel,$_GET['id']);
		$folder_url 	= $SettingsArr['theme_folder'];
		$savePath 		= TL_ROOT.'/'.$folder_url ;
		$settingsFile   = '_settings.scss';
		$componentsFile = str_replace(' ', '-',strtolower($SettingsArr['name'])).'.scss';
		$content 		= '';
		$config 		= '';
	
		if (!file_exists($savePath)){
			mkdir($savePath);
		}

		$content 	   .= '// Contao Open Source CMS, (c) 2014 Monique Hahnefeld, LGPL license'."\r\n\r\n\t".'@import "../foundation/scss/foundation/functions";'."\r\n";
		$config 	   .= '
		// Foundation by ZURB
		// foundation.zurb.com
		// Licensed under MIT Open Source
		
		// Make sure the charset is set appropriately
		@charset "UTF-8";
		@import "settings";
		
		// Behold, here are all the Foundation components.
		@import'."\r\n";

		if (file_exists($savePath."/".$settingsFile)) {
			unlink($savePath."/".$settingsFile);
		}
		if (file_exists($savePath."/".$componentsFile)) {
			unlink($savePath."/".$componentsFile);
		}
		$handle 			= fopen($savePath."/".$settingsFile, "w+");
		$componentsHandle   = fopen($savePath."/".$componentsFile, "w+");
		$countComponents    = 0;
		$ScssVariablenArr	= \Config::get('co_foundation_vars');
		foreach ($SettingsArr as $key => $value) {
			if (isset($ScssVariablenArr[$key]['var_scss'])) {
			
				$content 	 .= $ScssVariablenArr[$key]['var_scss'].':';	
				if (isset($ScssVariablenArr[$key]['pre_scss'])) {
					$content .= ''.$ScssVariablenArr[$key]['pre_scss'];	
				}
				$content 	 .= ''.$value;
				if (isset($ScssVariablenArr[$key]['post_scss'])) {
					$content .= ''.$ScssVariablenArr[$key]['post_scss'];	
				}
				$content 	 .= ' ;'."\r\n";	
			}

			if (array_key_exists($key.'_vars', $SettingsArr)&&$value == '1') {

				$content 	 .= ''.html_entity_decode($SettingsArr[$key.'_vars'])."\r\n";
				if ($key == 'global' || $key == 'typografie'){continue;}	
				if ($countComponents!==0) {
					$config  .= "\t".',';	
				}else {
					$config  .= "\t";
				}
				$config  	 .= '"../foundation/scss/foundation/components/'.str_replace('_', '-',$key).'"'."\r\n";
				$countComponents++;
			}
			
		}
		$config  			 .= ';';	
		fputs($handle, $content);
		fputs($componentsHandle,$config);
		fclose($handle);
		fclose($componentsHandle);
		unset($handle);
		unset($componentsHandle);


	}

	public function changeNav($arrModules, $blnShowAll) 
	{
		unset($arrModules["ftc"]["modules"]["tl_co_foundation_settings"]);
		return $arrModules;
	}


}
?>
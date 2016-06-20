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


class Themes extends \Backend
{

		
	public function generate($dc) 
	{
		
		$activeRecordRow  = $dc->__get('activeRecord')->row();
		$folder_url 			= $activeRecordRow['theme_folder'];
		$savePath 				= TL_ROOT.TL_PATH.'/'.$folder_url;
		$settingsFile   		= '_settings.scss';
		$configContentFile 	= str_replace(' ', '-',strtolower($activeRecordRow['name'])).'.scss';
		
		require_once('../config/framework.php'); 
		
		if (!file_exists($savePath)){
			mkdir($savePath);
		}

		$settingsContent 	  	= '// Contao Open Source CMS, (c) 2014 Monique Hahnefeld, LGPL license'."\r\n\r\n\t".'@import "../foundation/scss/foundation/functions";'."\r\n";
		$configContent 	   		= '
		// Foundation by ZURB
		// foundation.zurb.com
		// Licensed under MIT Open Source
		
		// Make sure the charset is set appropriately
		@charset "UTF-8";
		// Behold, here are all the Foundation components.
		';

		if (file_exists($savePath."/".$settingsFile)) {
			unlink($savePath."/".$settingsFile);
		}
		if (file_exists($savePath."/".$configContentFile)) {
			unlink($savePath."/".$configContentFile);
		}
		$handle 					= fopen($savePath."/".$settingsFile, "w+");
		$componentsHandle   = fopen($savePath."/".$configContentFile, "w+");
		$countComponents    = 0;
		$arrScssVariables		= \Config::get('co_foundation_vars');
		
		$arrConfigFiles 			= array();
		$arrConfigFiles[]  		= 'settings';
		foreach ($fwModulePackages as $name => $fwModule ){
			if($activeRecordRow[$name]){
				$arrConfigFiles[]   = "\t\'".$fwPathToFolder ."/scss/".$fwModule[0]."\'\r\n";	
			}
		}

		$configContent  	 .= "@import \r\n".implode(',', $arrConfigFiles).';';
			
		
		$arrSettingVariables 	= array();
		foreach ($arrScssVariables as $field => $settings) {
			$arrSettingVariables[] 			= "\t".$settings['var_scss'].': '.$settings['pre_scss'].$activeRecordRow[$field].$settings['post_scss']."\r\n";	
		}
		
		foreach ($fwSettingTextfields as $area){
			if($activeRecordRow['add_'.$area]){
				$arrSettingVariables[] 		= ''.html_entity_decode($activeRecordRow[$area])."\r\n";
			}	
		}
			
		$settingsContent		.= "\r\n".implode("\r\n", $arrSettingVariables);

		fputs($handle, $settingsContent);
		fputs($componentsHandle,$configContent);
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
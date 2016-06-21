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
// $this->getNestetImports($fwPathToFolder ."/scss/","util");
public function getNestetImports($path,$parentFileName){
		$utilFileContent = file_get_contents($path.$parentFileName."/_".$parentFileName.".scss");
		$arrUtilFileContent = explode('@import \'',$utilFileContent);
		$arrUtils = array();
		unset($arrUtilFileContent[0]);
		foreach ($arrUtilFileContent as $key => $name) {
			$utilName = substr($name, 0,strpos($name,'\''));
			$arrUtils[] =  file_get_contents($path.$parentFileName."/_".$utilName.".scss");
		}
		return implode("\r\n", $arrUtils);
}

		
	public function generate($dc) 
	{
		
		$activeRecordRow  = $dc->__get('activeRecord')->row();
		$folder_url 			= $activeRecordRow['theme_folder'];
		$savePath 				= TL_ROOT.'/'.$folder_url;
		$settingsFile   		= '_settings.scss';
		$configContentFile 	= str_replace(' ', '-',strtolower($activeRecordRow['name'])).'.scss';
		
		require_once(TL_ROOT.'/system/modules/codeowl_fw_foundation/config/framework.php'); 
		
		if (!file_exists($savePath)){
			mkdir($savePath);
		}
		$utilFileContent 			= $this->getNestetImports($fwPathToFolder ."/scss/","util"); 
		$globalsFileContent 	= file_get_contents($fwPathToFolder ."/scss/_global.scss");
		$floatFileContent 		= file_get_contents($fwPathToFolder ."/scss/components/_float.scss");  // str_replace('@import \'', '@import \''.$fwPathToFolder .'/scss/util/', $utilFileContent);
		$settingsContent 	  	= '// Contao Open Source CMS, (c) 2014 Monique Hahnefeld, LGPL license'."\r\n\r\n\t"
		//.'@import '. "\t'".$fwPathToFolder ."/scss/util/util';\r\n";
		.$utilFileContent.$globalsFileContent.$floatFileContent;
		//var_dump($settingsContent);
		//exit;
		

		if (file_exists($savePath."/".$settingsFile)) {
			unlink($savePath."/".$settingsFile);
		}
		if (file_exists($savePath."/".$configContentFile)) {
			unlink($savePath."/".$configContentFile);
		}
		
		// `-,-´ Create settings file
		$handle 					= fopen($savePath."/".$settingsFile, "w+");
		$arrScssVariables 		= \Config::get('co_foundation_vars');
		$arrSettingVariables 	= array();
		foreach ($arrScssVariables as $field => $settings) {
			$arrSettingVariables[] 			= "\t".$settings['var_scss'].': '.$settings['pre_scss'].$activeRecordRow[$field].$settings['post_scss'].";\r\n";	
		}
		
		foreach ($fwSettingTextfields as $area){
			if($activeRecordRow['add_'.$area.'_vars']){
				if(isset($fwModulePackages[$area]) && $fwModulePackages[$area][0] == $fwModulePackages[$area][1] ){
					
					$arrConfigFiles[] = $this->getNestetImports($fwPathToFolder ."/scss/",$fwModulePackages[$area][1]);	
					
				}
				$arrSettingVariables[] 		= ''.html_entity_decode($activeRecordRow[$area.'_vars'])."\r\n";
			}	
		}
			
		$settingsContent		.= "\r\n".implode("\r\n", $arrSettingVariables);

		fputs($handle, $settingsContent);
		fclose($handle);
		unset($handle);
		
		// `-,-´ Create custom foundation file
		$configContent 	   		= '
		// Foundation by ZURB
		// foundation.zurb.com
		// Licensed under MIT Open Source
		
		// Make sure the charset is set appropriately
		@charset "UTF-8";
		// Behold, here are all the Foundation components.
		';
		
		$componentsHandle   = fopen($savePath."/".$configContentFile, "w+");
		//$countComponents    = 0;
		$arrScssVariables		= \Config::get('co_foundation_vars');
		
		$arrConfigFiles 			= array();
		//$arrConfigFiles[]  		=  "\t\"".'settings'."\"\r\n";
		$arrConfigFiles[]  		=  $settingsContent."\r\n";
	
		foreach ($fwModulePackages as $name => $fwModule ){
			if($activeRecordRow[$name] && $fwModule[0] !== ''){
				//$arrConfigFiles[]   = "\t'".$fwPathToFolder ."/scss/".$fwModule[0]."'\r\n";				
				if($fwModule[0] == $fwModule[1]){
					$arrConfigFiles[] = $this->getNestetImports($fwPathToFolder ."/scss/",$fwModule[1]);				
				}else{
					$scssFileContent = file_get_contents($fwPathToFolder ."/scss/".$fwModule[0]."/_".$fwModule[1].".scss");
					$arrConfigFiles[] = 	$scssFileContent;//str_replace('@import \'', '@import \''.$fwPathToFolder .'/scss/'.$fwModule[0]."/".$fwModule[1], $scssFileContent)."\r\n";
					
				}
			}
		}

		//$configContent  	 .= "@import \r\n".implode(',', $arrConfigFiles).';';
		$configContent  	 .= "\r\n".implode("\r\n", $arrConfigFiles);
			
		fputs($componentsHandle,$configContent);
		fclose($componentsHandle);
		unset($componentsHandle);


	}

	public function changeNav($arrModules, $blnShowAll) 
	{
		unset($arrModules["ftc"]["modules"]["tl_co_foundation_settings"]);
		return $arrModules;
	}


}
?>
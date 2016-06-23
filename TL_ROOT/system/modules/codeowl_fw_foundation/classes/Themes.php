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
		//var_dump($arrUtilFileContent[0]);
		$fileStart = $arrUtilFileContent[0];
		unset($arrUtilFileContent[0]);
		foreach ($arrUtilFileContent as $key => $name) {
			$utilName = substr($name, 0,strpos($name,'\''));
			$arrUtils[] =  file_get_contents($path.$parentFileName."/_".$utilName.".scss");
		}
		$formsMixin = '';
		if($parentFileName == 'forms'){
			$formsMixin = '		
@mixin foundation-forms {
  @include foundation-form-text;
  @include foundation-form-checkbox;
  @include foundation-form-label;
  @include foundation-form-helptext;
  @include foundation-form-prepostfix;
  @include foundation-form-fieldset;
  @include foundation-form-select;
  @include foundation-form-error;
}
			';
		}
			$typographyMixin = '';
		if($parentFileName == 'typography'){
			$typographyMixin = '
			@mixin foundation-typography {
  @include foundation-typography-base;
  @include foundation-typography-helpers;
  @include foundation-text-alignment;
  @include foundation-print-styles;
}
			';

		}

			
		
		return $fileStart.implode("\r\n", $arrUtils).$formsMixin.$typographyMixin;
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
		
		// str_replace('@import \'', '@import \''.$fwPathToFolder .'/scss/util/', $utilFileContent);
		$settingsContent 	  	= '// Contao Open Source CMS, (c) 2014 Monique Hahnefeld, LGPL license'."\r\n\r\n\t"
		//.'@import '. "\t'".$fwPathToFolder ."/scss/util/util';\r\n";
		.$utilFileContent.$globalsFileContent;
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
		$arrConfigFiles 			= array();
		foreach ($arrScssVariables as $field => $settings) {
			$arrSettingVariables[] 			= "\t".$settings['var_scss'].': '.$settings['pre_scss'].$activeRecordRow[$field].$settings['post_scss'].";\r\n";	
		}
		
		foreach ($fwSettingTextfields as $area){
			if($activeRecordRow['add_'.$area.'_vars']){
			//	if(isset($fwModulePackages[$area]) && $fwModulePackages[$area][0] == $fwModulePackages[$area][1] ){
					
					//$arrSettingVariables[] = $this->getNestetImports($fwPathToFolder ."/scss/",$fwModulePackages[$area][1]);	
					
				//}
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
		
		
		//$arrConfigFiles[]  	= "\t\"".'settings'."\"\r\n";
		$arrConfigFiles[]  		= $settingsContent."\r\n";
		$arrMixins 				= array();
		$arrMixins[] 				= 'global-styles';
		$arrMixins[] 				= 'typography';
		//var_dump($activeRecordRow['flex_grid'].' test');
		if($activeRecordRow['flex_grid']){
			unset($fwModulePackages['grid']);
		}else{
			unset($fwModulePackages['flex_grid']);
		}
		$arrConfigFiles[] = $this->getNestetImports($fwPathToFolder ."/scss/",'typography');	
		foreach ($fwModulePackages as $name => $fwModule ){
			if($activeRecordRow[$name] && $fwModule[0] !== ''){
				//$arrConfigFiles[]   = "\t'".$fwPathToFolder ."/scss/".$fwModule[0]."'\r\n";			
				//var_dump(($fwModule[0] == $fwModule[1]), $fwModule[0],$fwModule[1]);	
				if($fwModule[0] == $fwModule[1]){
					$arrConfigFiles[] = $this->getNestetImports($fwPathToFolder ."/scss/",$fwModule[1]);				
				}else{
					$scssFileContent = file_get_contents($fwPathToFolder ."/scss/".$fwModule[0]."/_".$fwModule[1].".scss");
					$arrConfigFiles[] = 	$scssFileContent;//str_replace('@import \'', '@import \''.$fwPathToFolder .'/scss/'.$fwModule[0]."/".$fwModule[1], $scssFileContent)."\r\n";	
				}
			}

			if($activeRecordRow[$name] && $fwModule[2] !== ''){
				$arrMixins[] = $fwModule[2];
			}
		}
		$arrConfigFiles[]  		= file_get_contents($fwPathToFolder ."/scss/components/_float.scss"); 
		if($activeRecordRow['flex_grid']){
			$arrConfigFiles[]  	= file_get_contents($fwPathToFolder ."/scss/components/_flex.scss");
		}
		if($activeRecordRow['progress_bar']){
			$arrMixins[] = 'progress-element';
		}
		$arrMixins[] = 'float-classes';
		if($activeRecordRow['flex_grid']){
			$arrMixins[] = 'flex-classes';
		}

		//$configContent  	 .= "@import \r\n".implode(',', $arrConfigFiles).';';
		$configContent  	 .= "\r\n".implode("\r\n", $arrConfigFiles)
									 ."\r\n\t@include ".$fwModuleSassPrefix.implode(";\r\n\t @include ".$fwModuleSassPrefix, $arrMixins) .";" ;
			
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
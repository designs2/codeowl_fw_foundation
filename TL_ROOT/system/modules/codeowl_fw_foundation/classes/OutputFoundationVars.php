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


class OutputFoundationVars extends \Controller
{

  // `-,-´ Use Hook 'parseTemplate' 
  public function templates($obj){   
    
          $template = $obj->getName();
           // `-,-´ Check if is fe_page
          if (strpos($template, 'fe_page')!==FALSE) {
         
			
			
              if($obj->__get("layout")->__get("co_fw_add_foundation")){
              		
					// `-,-´error if jquery is not enabled in layout
					if(!$obj->__get("layout")->__get("addJQuery")){
						$this->log('Error! Please enable jQuery in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"), __METHOD__, TL_ERROR);
						throw new Exception('Error! Please enable jQuery in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"));
						//is backend only \Message::addError('Error! Please enable jQuery in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"));
						exit;
					}
					$fwSettingsModel = FoundationSettingsModel::findByPk($obj->__get("layout")->__get("co_fw_setting"));
					
					// `-,-´error if setting is not selected in layout or does not exist
					if(NULL == $fwSettingsModel){
						// \Message::addError('Error! Please select framework setting in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"));
							$this->log('Error! Please select framework setting in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"), __METHOD__, TL_ERROR);
							throw new Exception('Error! Please select framework setting in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"));
						exit;
					}
					$arrFwSettingsModel = $fwSettingsModel->row();
				
	              	  require(TL_ROOT.'/system/modules/codeowl_fw_foundation/config/framework.php'); 
					//  var_dump($fwPathToFolder,TL_ROOT,$obj->__get("layout")->__get("co_fw_add_foundation"));
					  $arrUtils 		= array();
					  $arrScripts 	= array();
					  $arrScripts['core']		= 'core';
					  foreach ($fwModulePackages as $name => $settings) {
					   		
					  	if(
					  		!array_key_exists($name, $fwModulePackages)  || 
					  		!$arrFwSettingsModel[$name] || 
					  		(!strpos($name, '_js') && !strpos($name, '_pi'))
							){
								continue;
							}
							// 			var_dump(array_key_exists($name, $fwModulePackages),'xx',$name,(!$arrFwSettingsModel[$name]),strpos($name, '_js'),(!strpos($name, '_js') && !strpos($name, '_pi')));
					
							if(is_array($settings[4])){
								  $arrUtils 						= array_merge($arrUtils,$settings[4]);
							}
						
						  $arrScripts[$name]		= $settings[3];
						  if($name == 'responsive_navigation'){
						  		$arrScripts[$name]		= $settings[3][0];
								$arrScripts[$name.'toggle']		= $settings[3][1];
						  }
						  
					  }
				  
					  // `-,-´ Utils
	                  $obj->__get("layout")->__set(
	                  		"ftcLib",
	                 		 $this->getLibStr(
	                 		 			$obj->__get("layout"),
	                 		 			$fwPathToFolder,
	                 		 			$fwModuleJsUtilsPrefix,
	                 		 			array_unique($arrUtils)
									)
					  );
					
					  // `-,-´ framework scripts
	                  $obj->__get("layout")->__set(
	                  		"ftcJS",
	                  		$this->getScriptStr(
	                  					$obj->layout,
	                  					$fwPathToFolder,
	                 		 			$fwModuleJsPrefix,
	                 		 			$arrScripts
										)
						);
						
						if(array_key_exists('offcanvas_js', $arrScripts)){
							$obj->__get("layout")->__set("co_fw_use_offcanvas",1);
						}
						 
	                  if ($template == 'fe_page_gc'){
	                      $obj->setName($template.'_ftc'); // full fw foundation support
	                  }
	                  if ($template == 'fe_page'||$template == 'fe_page_multitoggle'){
	                      $obj->setName($template.'_gc_ftc'); // full fw foundation support
	                  }
	              }
          } 

          switch ($template) {
	            case 'ce_list':
	            case 'mod_navigation':
	            case 'mod_search_ftc':
	            case 'mod_login_1cl':
	            case 'mod_login_2cl':
	            case 'mod_password':
	            case 'mod_breadcrumb':
          
               $obj->setName($template.'_ftc'); 
              	break;
            
            default:
             
              	break;
          }

   }  
    

  // `-,-´ Returns utils scripts for layout
  public function getLibStr($objLayout,$fwPathToFolder,$fwModuleJsUtilsPrefix,$arrUtils){
        	
  		global $objPage;
		$parsedTemplates 	= array();
		//get layouts fw setting, get row, iteriere all fields with _js and _pi if checked, look into packages array for js-file and required utils
		$objCombiner 		= new \Combiner();
		foreach ($arrUtils as $name => $path) {
			//$fwPathToFolder.
			$objCombiner->add('system/modules/codeowl_fw_foundation/assets/foundation/js/'.$fwModuleJsUtilsPrefix.$path.".js");
			//$template =  new \FrontendTemplate($path);
			//$parsedTemplates[] 	= $template->parse();
		}
		return "\r\n" . \Template::generateScriptTag($objCombiner->getCombinedFile());
				// . "\r\n"	. \Template::generateInlineScript(implode("\r\n\t",$parsedTemplates));

  }  

  // `-,-´ Returns foundation scripts for layout
  public function getScriptStr($objLayout,$fwPathToFolder,$fwModuleJsPrefix,$arrScripts){
        global $objPage;
		$parsedTemplates 	= array();
		//get layouts fw setting, get row, iteriere all fields with _js and _pi if checked, look into packages array for js-file and required utils
		$objCombiner 		= new \Combiner();
		foreach ($arrScripts as $name => $path) {
			$objCombiner->add('system/modules/codeowl_fw_foundation/assets/foundation/js/'.$fwModuleJsPrefix.$path.".js");
			if($path == 'core'){
				$name = 'co_fw_core';	
			}
				$template 					=  new \FrontendTemplate($name);
				$parsedTemplates[] 	= $template->parse();
			
		}
		$scriptTemplates = implode("\r\n\t",$parsedTemplates);
		//var_dump(\Template::generateInlineScript(implode("\r\n\t",$parsedTemplates)),$objCombiner->getCombinedFile(),\Template::generateScriptTag($objCombiner->getCombinedFile()));
		
		return "\r\n" . \Template::generateScriptTag($objCombiner->getCombinedFile())
				 . "\r\n"	. \Template::generateInlineScript($scriptTemplates);
  }    
}
?>

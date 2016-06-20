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
         
			
			
              if($obj->layout->__get("'co_fw_add_foundation")=='1'){
              		
					// `-,-´error if jquery is not enabled in layout
					if(!$obj->__get("layout")->__get("addJQuery")){
						 Message::addError('Error! Please enable jQuery in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"));
					}
					$fwSettingsModel = FoundationSettingsModel::findByPk($obj->__get("layout")->__get("'co_fw_setting"));
					// `-,-´error if setting is not selected in layout or does not exist
					if(NULL == $fwSettingsModel){
						 Message::addError('Error! Please select framework setting in this layout, named:'.$obj->__get("layout")->__get("title").', id:'.$obj->__get("layout")->__get("id"));
					}
					$arrFwSettingsModel = $fwSettingsModel->row();
				
	              	  require_once('../config/framework.php'); 
					  $arrUtils 		= array();
					  $arrScripts 	= array();
					  foreach ($fwModulePackages as $name => $settings) {
					  	if(
					  		!in_array($name, $arrFwSettingsModel)  || 
					  		!$arrFwSettingsModel[$name] || 
					  		(!strpos($name, '_js') && !strpos($name, '_pi'))
							){
								continue;
							}
						  $arrUtils 			= array_merge($arrUtils,$settings[2]);
						  $arrScripts[]		= $name;
					  }
				  
					  // `-,-´ Utils
	                  $obj->__get("layout")->__set(
	                  		"ftcLib",
	                 		 $this->getLibStr(
	                 		 			$obj->layout,
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
			$objCombiner->add($fwPathToFolder.'/js/'.$fwModuleJsUtilsPrefix.$path.".js");
			$parsedTemplates[] 	= new \FrontendTemplate($name);
		}
		
		return "\r\n" . \Template::generateScriptTag($objCombiner->getCombinedFile())
				 . "\r\n"	. \Template::generateInlineScript(implode("\r\n\t",$parsedTemplates));

  }  

  // `-,-´ Returns foundation scripts for layout
  public function getScriptStr($objLayout,$fwPathToFolder,$fwModuleJsPrefix,$arrScripts){
       global $objPage;
		$parsedTemplates 	= array();
		//get layouts fw setting, get row, iteriere all fields with _js and _pi if checked, look into packages array for js-file and required utils
		$objCombiner 		= new \Combiner();
		foreach ($arrScripts as $name => $path) {
			$objCombiner->add($fwPathToFolder.'/js/'.$fwModuleJsPrefix.$path.".js");
			$parsedTemplates[] 	= new \FrontendTemplate($name);
		}
		
		return "\r\n" . \Template::generateScriptTag($objCombiner->getCombinedFile())
				 . "\r\n"	. \Template::generateInlineScript(implode("\r\n\t",$parsedTemplates));
  }    
}
?>

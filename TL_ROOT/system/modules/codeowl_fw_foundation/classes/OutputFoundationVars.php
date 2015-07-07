<?php  
/** 
 * Extension for Contao Open Source CMS
 *
 * Copyright (C) 2015 Monique Hahnefeld
 *
 * @package codeowl_fw_foundation
 * @author  Monique Hahnefeld <info@monique-hahnefeld.de>
 * @link    http://codeowl.org
 * @license LGPLv3
 *
 * `-,-´
 *  ( )  codeowl.org
 *************************/
 
namespace Codeowl;


class OutputFoundationVars extends \Controller
{

  // `-,-´ Use Hook 'parseTemplate' 
  public function templates($obj){   
    
          $template = $obj->getName();
           // `-,-´ Check if is fe_page
          if (strpos($template, 'fe_page')!==FALSE) {
            
              if($obj->layout->__get("addFoundation")=='1'){
                  $obj->__get("layout")->__set("ftcLib",(string)$this->getLibStr($obj->layout));
                  $obj->__get("layout")->__set("ftcJS",(string)$this->getScriptStr($obj->layout));
                  // hack for other extensions which ask if mootools or jquery 
                  $obj->__get("layout")->__set("addJQuery","1");
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
    

  // `-,-´ Add jQuery Library + Modernizr scripts for Layout
  public function getLibStr($objLayout){
        $ScriptStr   = '';
        $VendorArr   = unserialize($objLayout->__get("FTC_JS"));
        $objCombiner = new \Combiner();
        $pathFTC     = 'system/modules/codeowl_fw_foundation/assets/';
        if (is_array($VendorArr)&&!empty($VendorArr)){
              foreach ($VendorArr as $k => $script) {
                
                if ($script!=='mediaelement_player') {
                 $objCombiner->add($pathFTC.'foundation/js/vendor/'.$script.".js");
                }
              }
        }

        if ((floatval(VERSION)>=3.3)) {
            $ScriptStr .= "\n" . \Template::generateScriptTag($objCombiner->getCombinedFile(), $blnXhtml); //>=3.3.0
        }else{
            $ScriptStr .= "\n" . '<script src="'.$objCombiner->getCombinedFile().'"></script>';
        }
        return $ScriptStr;
  }  

  // `-,-´ Add Foundation scripts for Layout
  public function getScriptStr($objLayout){
        $ScriptStr   = '';
        $arrPlugs    = array();
        $VendorArr   = unserialize($objLayout->__get("FTC_JS"));
        $objCombiner = new \Combiner();
        $pathFTC     = 'system/modules/codeowl_fw_foundation/assets/';
        if (is_array($VendorArr)&&!empty($VendorArr)){
            foreach ($VendorArr as $k => $script) {
              $arrPlugs[$script] = true;
            }
        }
        $PluginArr   = unserialize($objLayout->__get("FoundationJS"));

        if (is_array($PluginArr)&&!empty($PluginArr)){
          
        $objCombiner->add($pathFTC.'foundation/js/foundation/foundation.js');
        foreach ($PluginArr as $plugin){
            $objCombiner->add($pathFTC.'foundation/js/foundation/foundation.'.$plugin.'.js');
            $arrPlugs[$plugin] = true;
        }
        if ((floatval(VERSION)>=3.3)) {
          $ScriptStr .= "\n" . \Template::generateScriptTag($objCombiner->getCombinedFile(), $blnXhtml); //>=3.3.0
        }else{
          $ScriptStr .= "\n" . '<script src="'.$objCombiner->getCombinedFile().'"></script>';
        }
         
        $ScriptStr .= "\n" . '<script>
        $(document).ready(function(){' ;
            if ($arrPlugs['tooltip']) {
              $ScriptStr .= "\n" . "$('.ce_text [title]').each(function(index){
            _this = $(this);
              _this.attr('data-tooltip','tooltip'+index).addClass('tip-bottom');
              });";
            }
              $ScriptStr .= "\n" .  "$(document).foundation();";
            if ($arrPlugs['orbit']) { 
              $ScriptStr .= "\n" .  "$(document).foundation({  
               orbit: {
          slide_number_text: '/'}
            });";     
            }       
           if ($arrPlugs['tooltip']) { 
              $ScriptStr .= "\n" .  "$(document).foundation({
                    tooltips: {
                    selector : '.has-tip-custom,.button,a'
                  }
                });";       
           } 
           if ($arrPlugs['joyride']) { 
              $ScriptStr .= "\n" .  "$(document).foundation('joyride', 'start');";
                    
            }        
          
              $ScriptStr .= "\n" . "var doc = document.documentElement;
           doc.setAttribute('data-useragent', navigator.userAgent);";
              $ScriptStr .= "\n" . "});
          </script>";
                
           if ($arrPlugs['mediaelement_player']) {
              $ScriptStr .= "\n" . '<script src="'.$pathFTC.'/mediaelement/mediaelement-and-player.min.js"></script>'."\n";
              $ScriptStr .= "\n" .  "<script>
            $('video,audio').mediaelementplayer(/* Options */);
            </script>";
           }     
        }
        return $ScriptStr;
  }    
}
?>
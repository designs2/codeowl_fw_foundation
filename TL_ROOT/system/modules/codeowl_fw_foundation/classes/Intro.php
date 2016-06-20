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

class Intro extends \BackendModule
{

    protected $strTemplate = 'be_ftc_overview';

    protected $arrModules = array();


   
    public function generate()
    {
        

        // enable collapsing legends
        $session = \Session::getInstance()->get('fieldset_states');
        foreach ($this->getModules() as $k => $arrGroup) {
            list($k, $hide) = explode(':', $k, 2);

            if (isset($session['ftc_be_overview_legend'][$k])) {
                $arrGroup['collapse'] = !$session['ftc_be_overview_legend'][$k];
            } elseif ($hide == 'hide') {
                $arrGroup['collapse'] = true;
            }

            $this->arrModules[$k] = $arrGroup;
        }

        // Open module
        if (\Input::get('mod') != '') {
            return $this->getModule(\Input::get('mod'));
        } // Table set but module missing, fix the saveNcreate link
        elseif (\Input::get('table') != '') {
            foreach ($this->arrModules as $arrGroup) {
                if (isset($arrGroup['modules'])) {
                    foreach ($arrGroup['modules'] as $strModule => $arrConfig) {
                        if (is_array($arrConfig['tables']) && in_array(\Input::get('table'), $arrConfig['tables'])) {
                            \Controller::redirect($this->addToUrl('mod=' . $strModule));
                        }
                    }
                }
            }
        }
		 
        return parent::generate();
    }


    protected function getModules()
    {
       

        $this->addIntroduction($return);	       
        return $return;
    }


	protected function compile()
    {		

    	$modul_links=array();	
    	$this->addIntroduction($return);
    
        $this->Template->before = '<h1 id="tl_welcome">' . sprintf($GLOBALS['TL_LANG']['MSC']['config_theme'], $GLOBALS['TL_LANG']['MSC']['ftc_version']) . '</h1>'; 			 
		$token="";
		 
		$modul_links['edit']='contao/main.php?do=tl_ftc_settings&act=edit&id=3';
		$modul_links['list']='contao/main.php?do=tl_ftc_settings';
		$this->Template->modul_links= $modul_links;
		$this->Template->listtable = $GLOBALS['TL_DCA']['tl_ftc_settings'];
		$this->Template->modules = $this->arrModules;
       
    }

    protected function addIntroduction(&$return)
    {
      
            $objTemplate = new \BackendTemplate('be_ftc_introduction');

            $return['introduction']['label'] = 'Introduction';
            $return['introduction']['html']  = $objTemplate->parse();
      
    }

}

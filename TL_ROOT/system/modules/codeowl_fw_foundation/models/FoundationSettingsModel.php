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

class FoundationSettingsModel extends \Model
{

    protected static $strTable = 'tl_co_foundation_settings';
    
    public function getMaxCols() {
    
        $objModel = FoundationSettingsModel::findAll()->fetchAll();
        $Settings =$objModel;
       
        $ColsArr =array();
        foreach ($Settings as $k => $set) {
         	$ColsArr[]=$set['cols'];
        }
        $ColsMax= max($ColsArr);
    
    	return $ColsMax;
    }
    
}

?>
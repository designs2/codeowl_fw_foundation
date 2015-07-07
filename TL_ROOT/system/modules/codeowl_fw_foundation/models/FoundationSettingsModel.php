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
    
        $objModel = new FoundationSettingsModel;
        
        if (NULL === $objModel) {
            return \Config::get('co_grid_columns_size');
        }
        $objModel = $objModel::findAll();
        if (NULL != $objModel) {
            $Settings = $objModel->fetchAll();

        $ColsArr = array();
        foreach ($Settings as $k => $set) {
            $ColsArr[]=$set['cols'];
        }
        $ColsMax = max($ColsArr);
    
        return $ColsMax;
        }
    }

    public function getSettings($Rel,$Val) 
    {   
        $objModel = new FoundationSettingsModel;
        $objModel = $objModel::findBy($Rel,$Val);
        $arrData = array();
        if (NULL!=$objModel) {
           $arrData = $objModel->arrData;
        }
        return $arrData; 
    } 
    
}

?>
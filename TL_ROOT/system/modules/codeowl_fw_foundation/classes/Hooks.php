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

class Hooks 
{

    public function colSizeHook()
    {
        
        // `-,-´ Get the highest value from the FW Settings
            if(!isset($FoundationSettingsModel)){
            $FoundationSettingsModel = new FoundationSettingsModel;
                if (NULL!==$FoundationSettingsModel) {
                     $tableExists = \Database::getInstance()->tableExists($FoundationSettingsModel::getTable());
                    if(FALSE==$tableExists||NULL==$FoundationSettingsModel->getMaxCols()){return;}
                     \Config::set('co_grid_columns_size',$FoundationSettingsModel->getMaxCols());
                }
            }
        
   
    }

}
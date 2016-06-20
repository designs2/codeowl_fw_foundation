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
//1 ask if fw tables exist, 2 ask for old fieldnames
//rename the changed fieldnames

//tl_content, tl_layout, tl_module add co_fw_ to every field from this extension
//tl_layout additional changes

$Upgrade = new \Codeowl\Upgrade;
$Upgrade->run();

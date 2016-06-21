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

use Codeowl\OutputGridVars as OutputGridVars;

class ContentFlexVideo extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_flex_video';


	// `-,-´ Extend the parent method
	public function generate()
	{
		if (!$this->co_fw_use_youtube&&!$this->co_fw_vimeo&&!$this->co_fw_own_src)
		{
			return '';
		}

		if (TL_MODE == 'BE')
		{
			if ($this->co_fw_use_youtube||$this->co_fw_vimeo) {
				return ($this->co_fw_vimeo)?'<p>vimeo '. $this->co_fw_youtube_vimeo_id . '</p>' :'<p> youtube '. $this->co_fw_youtube_vimeo_id  . '</p>';
			}else {
				return '<p> eigene videos </p>';
			}
			
		}

		return parent::generate();
	}

	// `-,-´ Generate the module
	protected function compile()
	{
		$this->Template->size = '';

		// `-,-´ Set the size
		if ($this->playerSize != '')
		{
			$size = deserialize($this->playerSize);

			if (is_array($size))
			{
				$this->Template->size = ' width="' . $size[0] . '" height="' . $size[1] . '"';
			}
		}

		$this->Template->poster = false;

		if ($this->co_fw_use_youtube) {
			$this->Template->use_iframe=true;
			$this->Template->embed_path = 'http://www.youtube.com/embed/' . $this->co_fw_youtube_vimeo_id;
		}
		if ($this->co_fw_vimeo) {
			$this->Template->use_iframe=true;
			$this->Template->embed_path = 'http://player.vimeo.com/video/' . $this->co_fw_youtube_vimeo_id;
		}
		if ($this->co_fw_own_src) {
			$this->Template->use_iframe=false;
			
			$video_files= unserialize($this->co_fw_video_src);
			
			$video_Arr =array();
			if (is_Array($video_files)) {
				
			
				foreach ($video_files as $c => $file) {
					$objFile = new \stdClass();
					if (($objFile = \FilesModel::findByUuid($file['src'])) !== null)
					{
					//var_dump($objFile);
					$video_Arr[$c]['mime'] = $file['mime'];
					$video_Arr[$c]['src'] = $objFile->path;
					}
				}
				//array($objFile);
				$this->Template->embed_path =$video_Arr;
			}
			//video <track>
			$track_files= unserialize($this->co_fw_track_src);
			
			$track_Arr =array();
			if (is_Array($track_files)) {
				foreach ($track_files as $c => $file) {
					$objFile = new \stdClass();
					if (($objFile = \FilesModel::findByUuid($file['src'])) !== null)
					{
					//var_dump($objFile);
					$track_Arr[$c]['kind'] = $file['kind'];
					$track_Arr[$c]['src'] = $objFile->path;
					$track_Arr[$c]['lang'] = $file['lang'];
					}
				}
				//array($objFile);
				$this->Template->track_path =$track_Arr;
			}
			if ($this->co_fw_flash_player_src!==Null&&$this->co_fw_flash_video_src!==Null) {
				$objFile = new \stdClass();
				if (($objFile = \FilesModel::findByUuid($this->co_fw_flash_player_src)) !== null)
				{
				//var_dump($objFile);
				$this->Template->flash_player_src =$objFile->path;
				}
				$objFile = new \stdClass();
				if (($objFile = \FilesModel::findByUuid($this->co_fw_flash_video_src)) !== null)
				{
				//var_dump($objFile);
				$this->Template->flash_video_src =$objFile->path;
				}
			}
				
			// `-,-´ Optional poster
			if ($this->posterSRC != '')
			{	$objFile = new \stdClass();
				if (($objFile = \FilesModel::findByUuid($this->posterSRC)) !== null)
				{
					$this->Template->poster = $objFile->path;
				}
			}
		}

		$this->Template->isVideo = true;
		$this->Template->autoplay = $this->co_fw_autoplay;

		// `-,-´ css and attributes
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;
	}
}

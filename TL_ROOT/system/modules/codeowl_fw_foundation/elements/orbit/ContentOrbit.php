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

use Contao\Controller;
use Codeowl\OutputGridVars as OutputGridVars;

class ContentOrbit extends \ContentElement
{

	// `-,-´ Template
	protected $strTemplate = 'ce_orbit';

	// `-,-´ Return if there are no files
	public function generate()
	{
		// Use the home directory of the current user as file source
		if ($this->useHomeDir && FE_USER_LOGGED_IN)
		{
			$this->import('FrontendUser', 'User');

			if ($this->User->assignDir && $this->User->homeDir)
			{
				$this->multiSRC = array($this->User->homeDir);
			}
		}
		else
		{
			$this->multiSRC = deserialize($this->multiSRC);
		}

		// Return if there are no files
		if (!is_array($this->multiSRC) || empty($this->multiSRC))
		{
			return '';
		}

		// Get the file entries from the database
		$this->objFiles = \FilesModel::findMultipleByUuids($this->multiSRC);

		if ($this->objFiles === null)
		{
			if (!\Validator::isUuid($this->multiSRC[0]))
			{
				return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
			}

			return '';
		}

		return parent::generate();
	}


	// `-,-´ Generate the content element
	protected function compile()
	{
		global $objPage;

		$images = array();
		$auxDate = array();
		$objFiles = $this->objFiles;

		// `-,-´ Get all images
		while ($objFiles->next())
		{
			// `-,-´ Continue if the files has been processed or does not exist
			if (isset($images[$objFiles->path]) || !file_exists(TL_ROOT . '/' . $objFiles->path))
			{
				continue;
			}

			// `-,-´ Single files
			if ($objFiles->type == 'file')
			{
				$objFile = new \File($objFiles->path, true);

				if (!$objFile->isGdImage)
				{
					continue;
				}

				$arrMeta = $this->getMetaData($objFiles->meta, $objPage->language);

				// `-,-´ Use the file name as title if none is given
				if ($arrMeta['title'] == '')
				{
					$arrMeta['title'] = specialchars(str_replace('_', ' ', $objFile->filename));
				}

				// `-,-´ Add the image
				$images[$objFiles->path] = array
				(
					'id'        => $objFiles->id,
					'uuid'      => $objFiles->uuid,
					'name'      => $objFile->basename,
					'singleSRC' => $objFiles->path,
					'alt'       => $arrMeta['title'],
					'imageUrl'  => $arrMeta['link'],
					'caption'   => $arrMeta['caption']
				);

				$auxDate[] = $objFile->mtime;
			}

			// `-,-´ Folders
			else
			{
				$objSubfiles = \FilesModel::findByPid($objFiles->uuid);

				if ($objSubfiles === null)
				{
					continue;
				}

				while ($objSubfiles->next())
				{
					// `-,-´ Skip subfolders
					if ($objSubfiles->type == 'folder')
					{
						continue;
					}

					$objFile = new \File($objSubfiles->path, true);

					if (!$objFile->isGdImage)
					{
						continue;
					}

					$arrMeta = $this->getMetaData($objSubfiles->meta, $objPage->language);

					// `-,-´ Use the file name as title if none is given
					if ($arrMeta['title'] == '')
					{
						$arrMeta['title'] = specialchars(str_replace('_', ' ', $objFile->filename));
					}

					// `-,-´ Add the image
					$images[$objSubfiles->path] = array
					(
						'id'        => $objSubfiles->id,
						'uuid'      => $objSubfiles->uuid,
						'name'      => $objFile->basename,
						'singleSRC' => $objSubfiles->path,
						'alt'       => $arrMeta['title'],
						'imageUrl'  => $arrMeta['link'],
						'caption'   => $arrMeta['caption']
					);

					$auxDate[] = $objFile->mtime;
				}
			}
		}

		// `-,-´ Sort array
		switch ($this->sortBy)
		{
			default:
			case 'name_asc':
				uksort($images, 'basename_natcasecmp');
				break;

			case 'name_desc':
				uksort($images, 'basename_natcasercmp');
				break;

			case 'date_asc':
				array_multisort($images, SORT_NUMERIC, $auxDate, SORT_ASC);
				break;

			case 'date_desc':
				array_multisort($images, SORT_NUMERIC, $auxDate, SORT_DESC);
				break;

			case 'meta': // Backwards compatibility
			case 'custom':
				if ($this->orderSRC != '')
				{
					$tmp = deserialize($this->orderSRC);

					if (!empty($tmp) && is_array($tmp))
					{
						// `-,-´ Remove all values
						$arrOrder = array_map(function(){}, array_flip($tmp));

						// `-,-´ Move the matching elements to their position in $arrOrder
						foreach ($images as $k=>$v)
						{
							if (array_key_exists($v['uuid'], $arrOrder))
							{
								$arrOrder[$v['uuid']] = $v;
								unset($images[$k]);
							}
						}

						// `-,-´ Append the left-over images at the end
						if (!empty($images))
						{
							$arrOrder = array_merge($arrOrder, array_values($images));
						}

						// `-,-´ Remove empty (unreplaced) entries
						$images = array_values(array_filter($arrOrder));
						unset($arrOrder);
					}
				}
				break;

			case 'random':
				shuffle($images);
				break;
		}

		$images = array_values($images);

		// `-,-´ Limit the total number of items (see #2652)
		if ($this->numberOfItems > 0)
		{
			$images = array_slice($images, 0, $this->numberOfItems);
		}

		$offset = 0;
		$total = count($images);
		$limit = $total;

		$intMaxWidth = (TL_MODE == 'BE') ? 640  : \Config::get('maxImageWidth');
		$body = array();

		// `-,-´ 
		for ($i=$offset; $i<$limit; $i++)
		{
			$class_tr = '';

			if ($i == 0)
			{
				$class_tr .= ' first';
			}

			if (($i + $this->perRow) >= $limit)
			{
				$class_tr .= ' last';
			}

				$objCell = new \stdClass();
				

				// `-,-´ Empty cell
				if (!is_array($images[$i]) || ($i) >= $limit)
				{
					$objCell->class = ' '.$class_tr;
				}
				else
				{
					// `-,-´ Add size 
					$images[$i]['size'] 		= $this->size;
					$this->addImageToTemplateFTC($objCell, $images[$i], $intMaxWidth);

					// `-,-´ Add column width and class
					$objCell->class = ' '.$class_tr;
				}

				$body[$i] = $objCell;
		
		}

		$strTemplate = 'orbit_list';


		$objTemplate = new \FrontendTemplate($strTemplate);
		$objTemplate->setData($this->arrData);

		$objTemplate->body = $body;
		$objTemplate->headline = $this->headline; // see #1603

		$this->Template->images = $objTemplate->parse();

		// `-,-´ css and attributes
		$cssClassSet 					= new OutputGridVars;
		$objEl 							= $cssClassSet->design_elements($this);
		$this->Template->ftc_classes 	= $objEl->ftc_classes;
		$this->Template->ftcID 			= $objEl->ftcID;
		$this->Template->data_attr 		= $objEl->data_attr;
		$this->Template->class 			= $objEl->ftc_classes;
		$this->Template->cssID 			= $objEl->ftcID;
	}
		
		

	/**
	 * Add an image to a template
	 *
	 * @param object  $objTemplate   The template object to add the image to
	 * @param array   $arrItem       The element or module as array
	 * @param integer $intMaxWidth   An optional maximum width of the image
	 */
	public static function addImageToTemplateFTC($objTemplate, $arrItem, $intMaxWidth=null)
	{
		global $objPage;
		try
		{
			$objFile = new \File($arrItem['singleSRC'], true);
		}
		catch (\Exception $e)
		{
			$objFile = new \stdClass();
			$objFile->imageSize = false;
		}
		$imgSize = $objFile->imageSize;
		$size = deserialize($arrItem['size']);
		if ($intMaxWidth === null)
		{
			$intMaxWidth = (TL_MODE == 'BE') ? 320 : \Config::get('maxImageWidth');
		}
		// Store the original dimensions
		$objTemplate->width = $imgSize[0];
		$objTemplate->height = $imgSize[1];
		// Adjust the image size
		if ($intMaxWidth > 0)
		{
			// Subtract the margins before deciding whether to resize (see #6018)
			if ($size[0] > $intMaxWidth || (!$size[0] && !$size[1] && $imgSize[0] > $intMaxWidth))
			{
				// See #2268 (thanks to Thyon)
				$ratio = ($size[0] && $size[1]) ? $size[1] / $size[0] : $imgSize[1] / $imgSize[0];
				$size[0] = $intMaxWidth;
				$size[1] = floor($intMaxWidth * $ratio);
			}
		}
		try
		{
			$src = \Image::create($arrItem['singleSRC'], $size)->executeResize()->getResizedPath();
			$picture = \Picture::create($arrItem['singleSRC'], $size)->getTemplateData();

			if ($src !== $arrItem['singleSRC'])
			{
				$objFile = new \File(rawurldecode($src), true);
			}
		}
		catch (\Exception $e)
		{
			\System::log('Image "' . $arrItem['singleSRC'] . '" could not be processed: ' . $e->getMessage(), __METHOD__, TL_ERROR);
			$src = '';
			$picture = array('img'=>array('src'=>'', 'srcset'=>''), 'sources'=>array());
		}
		// Image dimensions
		if (($imgSize = $objFile->imageSize) !== false)
		{
			$objTemplate->arrSize = $imgSize;
			$objTemplate->imgSize = ' width="' . $imgSize[0] . '" height="' . $imgSize[1] . '"';
		}
		$picture['alt'] = specialchars($arrItem['alt']);
		$picture['title'] = specialchars($arrItem['title']);
		$picture['caption'] = specialchars($arrItem['caption']);
		
		$objTemplate->picture = $picture;

		// Do not urlEncode() here because getImage() already does (see #3817)
		$objTemplate->src = TL_FILES_URL . $src;
		$objTemplate->alt = specialchars($arrItem['alt']);
		$objTemplate->title = specialchars($arrItem['title']);
		$objTemplate->caption = $arrItem['caption'];
		$objTemplate->singleSRC = $arrItem['singleSRC'];
	}
		
}

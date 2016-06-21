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

class ModuleTopbarSectionCustom extends \ModuleExt
{

	// `-,-´ Template
	protected $strTemplate = 'mod_topbar_section';


	// `-,-´ Redirect to the selected page
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['customnav'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// `-,-´ Always return an array (see #4616)
		$this->pages = deserialize($this->pages, true);

		if (empty($this->pages) || $this->pages[0] == '')
		{
			return '';
		}

		$strBuffer = parent::generate();
		return $strBuffer;//($this->Template->items != '') ? $strBuffer : '';
	}

	// `-,-´ Generate the module
	protected function compile()
	{
		global $objPage;

		$items = array();
		$groups = array();

		// `-,-´ Get all groups of the current front end user
		if (FE_USER_LOGGED_IN)
		{
			$this->import('FrontendUser', 'User');
			$groups = $this->User->groups;
		}

		// `-,-´ Get all active pages
		$objPages = \PageModel::findPublishedRegularWithoutGuestsByIds($this->pages);

		// `-,-´ Return if there are no pages
		if ($objPages === null)
		{
			return;
		}

		$arrPages = array();

		// `-,-´ Sort the array keys according to the given order
		if ($this->orderPages != '')
		{
			$tmp = deserialize($this->orderPages);

			if (!empty($tmp) && is_array($tmp))
			{
				$arrPages = array_map(function(){}, array_flip($tmp));
			}
		}

		// `-,-´ Add the items to the pre-sorted array
		while ($objPages->next())
		{
			$arrPages[$objPages->id] = $objPages->current()->loadDetails()->row(); // see #3765
		}

		// `-,-´ Set default template
		if ($this->navigationTpl == '')
			{	
			}
		
		if ($this->strTemplate=='mod_topbar_section') {
			$this->navigationTpl = 'nav_default_topbar';
		}else{
			$this->navigationTpl = 'nav_default';
		}

		$objTemplate = new \FrontendTemplate($this->navigationTpl);

		$objTemplate->type = get_class($this);
		$objTemplate->cssID = $this->cssID; // see #4897 and 6129
		$objTemplate->level = 'level_1';

		foreach ($arrPages as $arrPage)
		{
			// `-,-´ Skip hidden pages (see #5832)
			if (!is_array($arrPage))
			{
				continue;
			}

			$_groups = deserialize($arrPage['groups']);

			// `-,-´ Do not show protected pages unless a back end or front end user is logged in
			if (!$arrPage['protected'] || BE_USER_LOGGED_IN || (is_array($_groups) && count(array_intersect($_groups, $groups))) || $this->showProtected)
			{
				// `-,-´ Get href
				switch ($arrPage['type'])
				{
					case 'redirect':
						$href = $arrPage['url'];
						break;

					case 'forward':
						if (($objNext = \PageModel::findPublishedById($arrPage['jumpTo'])) !== null)
						{
							$strForceLang = null;
							$objNext->loadDetails();

							// `-,-´ Check the target page language (see #4706)
							if (\Config::get('addLanguageToUrl'))
							{
								$strForceLang = $objNext->language;
							}

							$href = $this->generateFrontendUrl($objNext->row(), null, $strForceLang);

							// `-,-´ Add the domain if it differs from the current one (see #3765)
							if ($objNext->domain != '' && $objNext->domain != \Environment::get('host'))
							{
								$href = (\Environment::get('ssl') ? 'https://' : 'http://') . $objNext->domain . TL_PATH . '/' . $href;
							}
							break;
						}
						// `-,-´  DO NOT ADD A break; STATEMENT

					default:
						$href = $this->generateFrontendUrl($arrPage, null, $arrPage['rootLanguage']);

						// `-,-´ Add the domain if it differs from the current one (see #3765)
						if ($arrPage['domain'] != '' && $arrPage['domain'] != \Environment::get('host'))
						{
							$href = (\Environment::get('ssl') ? 'https://' : 'http://') . $arrPage['domain'] . TL_PATH . '/' . $href;
						}
						break;
				}

				// `-,-´ Active page
				if ($objPage->id == $arrPage['id'])
				{
					$strClass = trim($arrPage['cssClass']);
					$row = $arrPage;

					$row['isActive'] = true;
					$row['class'] = trim('active ' . $strClass);
					$row['title'] = specialchars($arrPage['title'], true);
					$row['pageTitle'] = specialchars($arrPage['pageTitle'], true);
					$row['link'] = $arrPage['title'];
					$row['href'] = $href;
					$row['nofollow'] = (strncmp($arrPage['robots'], 'noindex', 7) === 0);
					$row['target'] = '';
					$row['description'] = str_replace(array("\n", "\r"), array(' ' , ''), $arrPage['description']);

					// `-,-´ Override the link target
					if ($arrPage['type'] == 'redirect' && $arrPage['target'])
					{
						$row['target'] = ($objPage->outputFormat == 'xhtml') ? ' onclick="return !window.open(this.href)"' : ' target="_blank"';
					}

					$items[] = $row;
				}

				// `-,-´ Regular page
				else
				{
					$strClass = trim($arrPage['cssClass'] . (in_array($arrPage['id'], $objPage->trail) ? ' trail' : ''));
					$row = $arrPage;

					$row['isActive'] = false;
					$row['class'] = $strClass;
					$row['title'] = specialchars($arrPage['title'], true);
					$row['pageTitle'] = specialchars($arrPage['pageTitle'], true);
					$row['link'] = $arrPage['title'];
					$row['href'] = $href;
					$row['nofollow'] = (strncmp($arrPage['robots'], 'noindex', 7) === 0);
					$row['target'] = '';
					$row['description'] = str_replace(array("\n", "\r"), array(' ' , ''), $arrPage['description']);

					// `-,-´ Override the link target
					if ($arrPage['type'] == 'redirect' && $arrPage['target'])
					{
						$row['target'] = ($objPage->outputFormat == 'xhtml') ? ' onclick="return !window.open(this.href)"' : ' target="_blank"';
					}

					$items[] = $row;
				}
			}
		}

		// `-,-´ Add classes first and last
		$items[0]['class'] = trim($items[0]['class'] . ' first');
		$last = count($items) - 1;
		$items[$last]['class'] = trim($items[$last]['class'] . ' last');

		$objTemplate->items = $items;

		$this->Template->request = \Environment::get('indexFreeRequest');
		$this->Template->skipId = 'skipNavigation' . $this->id;
		$this->Template->skipNavigation = specialchars($GLOBALS['TL_LANG']['MSC']['skipNavigation']);
		$this->Template->items = !empty($items) ? $objTemplate->parse() : '';
		
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

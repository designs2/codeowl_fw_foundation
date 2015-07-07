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
 *	( )  codeowl.org
 *************************/
 
namespace Codeowl;

class ModuleExt extends \Module
{

	// `-,-´ Compile the current element
	protected function compile(){}
		
	// `-,-´ Recursively compile the navigation menu and return it as HTML string
	public function renderNavigationFTC($pid, $level=1, $host=null, $language=null)
	{
		// `-,-´ Get all active subpages
		$objSubpages = \PageModel::findPublishedSubpagesWithoutGuestsByPid($pid, $this->showHidden, $this instanceof \ModuleSitemap);

		if ($objSubpages === null)
		{
			return '';
		}

		$items = array();
		$groups = array();

		// `-,-´ Get all groups of the current front end user
		if (FE_USER_LOGGED_IN)
		{
			$this->import('FrontendUser', 'User');
			$groups = $this->User->groups;
		}

		// `-,-´ Layout template fallback
		if ($this->navigationTpl == '')
		{	
		}
		
		if ($this->strTemplate=='mod_navigation_offcanvas') {
			$this->navigationTpl = 'nav_default_offcanvas';
			$trailClassName = ' trail';
			$submenuClassName = ' submenu';
			$siblingClassName = ' sibling';
		
		}else if ($this->strTemplate=='mod_topbar_section') {
			$this->navigationTpl = 'nav_default_topbar';
			$trailClassName = ' trail has-dropdown';
			$submenuClassName = ' submenu has-dropdown';
			$siblingClassName = ' sibling';
			$addToLevel = ' dropdown';
		}else{
			$this->navigationTpl = 'nav_default';
			$trailClassName = ' trail';
			$submenuClassName = ' submenu';
			$siblingClassName = ' sibling';
	
		}
		$objTemplate = new \FrontendTemplate($this->navigationTpl);

		$objTemplate->level_int = $level;
		$objTemplate->type = get_class($this);
		$objTemplate->cssID = $this->cssID; // see #4897

		$levelClasses = '';
		if (($level>1&&$level<=intval($this->dropdown_level))&&$this->navigationTpl=='nav_default_topbar') {
			$levelClasses .= $addToLevel .' ';
		}
		if ($level==1&&$this->navigationTpl=='nav_default_topbar') {
			$levelClasses .= $this->offcanvas_align .' ';
		}
		$levelClasses .= 'level_' . $level++;
		$objTemplate->level=$levelClasses;


		// `-,-´ Get page object
		global $objPage;

		// `-,-´ Browse subpages
		while ($objSubpages->next())
		{
			// `-,-´ Skip hidden sitemap pages
			if ($this instanceof \ModuleSitemap && $objSubpages->sitemap == 'map_never')
			{
				continue;
			}

			$subitems = '';
			$_groups = deserialize($objSubpages->groups);

			// `-,-´ Override the domain (see #3765)
			if ($host !== null)
			{
				$objSubpages->domain = $host;
			}

			// `-,-´ Do not show protected pages unless a back end or front end user is logged in
			if (!$objSubpages->protected || BE_USER_LOGGED_IN || (is_array($_groups) && count(array_intersect($_groups, $groups))) || $this->showProtected || ($this instanceof \ModuleSitemap && $objSubpages->sitemap == 'map_always'))
			{
				// `-,-´ Check whether there will be subpages
				if ($objSubpages->subpages > 0 && (!$this->showLevel || $this->showLevel >= $level || (!$this->hardLimit && ($objPage->id == $objSubpages->id || in_array($objPage->id, $this->Database->getChildRecords($objSubpages->id, 'tl_page'))))))
				{
					$subitems = $this->renderNavigationFTC($objSubpages->id, $level, $host, $language);
				}

				// `-,-´ Get href
				switch ($objSubpages->type)
				{
					case 'redirect':
						$href = $objSubpages->url;

						if (strncasecmp($href, 'mailto:', 7) === 0)
						{
							$href = \String::encodeEmail($href);
						}
						break;

					case 'forward':
						if ($objSubpages->jumpTo)
						{
							$objNext = $objSubpages->getRelated('jumpTo');
						}
						else
						{
							$objNext = \PageModel::findFirstPublishedRegularByPid($objSubpages->id);
						}

						if ($objNext !== null)
						{
							// `-,-´ Hide the link if the target page is invisible
							if (!$objNext->published || ($objNext->start != '' && $objNext->start > time()) || ($objNext->stop != '' && $objNext->stop < time()))
							{
								continue(2);
							}

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
						$href = $this->generateFrontendUrl($objSubpages->row(), null, $language);

						// `-,-´ Add the domain if it differs from the current one (see #3765)
						if ($objSubpages->domain != '' && $objSubpages->domain != \Environment::get('host'))
						{
							$href = (\Environment::get('ssl') ? 'https://' : 'http://') . $objSubpages->domain . TL_PATH . '/' . $href;
						}
						break;
				}

				$row = $objSubpages->row();

				// `-,-´ Active page
				if (($objPage->id == $objSubpages->id || $objSubpages->type == 'forward' && $objPage->id == $objSubpages->jumpTo) && !$this instanceof \ModuleSitemap && !\Input::get('articles'))
				{
					// `-,-´ Mark active forward pages (see #4822)
					$strClass = (($objSubpages->type == 'forward' && $objPage->id == $objSubpages->jumpTo) ? 'forward' . (in_array($objSubpages->id, $objPage->trail) ? $trailClassName : '') : 'active') . (($subitems != '') ? $submenuClassName  : '') . ($objSubpages->protected ? ' protected' : '') . (($objSubpages->cssClass != '') ? ' ' . $objSubpages->cssClass : '');

					$row['isActive'] = true;
				}

				// `-,-´ Regular page
				else
				{
					$strClass = (($subitems != '') ? $submenuClassName : '') . ($objSubpages->protected ? ' protected' : '') . (in_array($objSubpages->id, $objPage->trail) ? $trailClassName : '') . (($objSubpages->cssClass != '') ? ' ' . $objSubpages->cssClass : '');

					// `-,-´ Mark pages on the same level (see #2419)
					if ($objSubpages->pid == $objPage->pid)
					{
						$strClass .= ' sibling';
					}

					$row['isActive'] = false;
				}

				$row['subitems'] = $subitems;
				$row['class'] = trim($strClass);
				$row['title'] = specialchars($objSubpages->title, true);
				$row['pageTitle'] = specialchars($objSubpages->pageTitle, true);
				$row['link'] = $objSubpages->title;
				$row['href'] = $href;
				$row['nofollow'] = (strncmp($objSubpages->robots, 'noindex', 7) === 0);
				$row['target'] = '';
				$row['description'] = str_replace(array("\n", "\r"), array(' ' , ''), $objSubpages->description);

				// Override the link target
				if ($objSubpages->type == 'redirect' && $objSubpages->target)
				{
					$row['target'] = ($objPage->outputFormat == 'xhtml') ? ' onclick="return !window.open(this.href)"' : ' target="_blank"';
				}

				$items[] = $row;
			}
		}

		// `-,-´ Add classes first and last
		if (!empty($items))
		{
			$last = count($items) - 1;

			$items[0]['class'] = trim($items[0]['class'] . ' first');
			$items[$last]['class'] = trim($items[$last]['class'] . ' last');
		}

		$objTemplate->items = $items;
		return !empty($items) ? $objTemplate->parse() : '';
	}
}

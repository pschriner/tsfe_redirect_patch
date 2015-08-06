<?php
namespace DieMedialen\TsfeRedirectPatch\Xclass;
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
class TypoScriptFrontendController extends \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController {
	
	public function getPageAndRootline() {
		$requestedId = $this->id;
		parent::getPageAndRootline();
		if ($this->originalShortcutPage == NULL && $this->originalMountPointPage == NULL) { // nothing to do
			return;
		}
		
		// check rootline
		$originalRootline = $this->sys_page->getRootLine($requestedId, $this->MP);
		$uids = array();
		foreach ($originalRootline as $page) {
			$uids[] = $page['uid'];
		}
		
		$currentPage = array_search($this->id, $uids);
		if ($this->originalShortcutPage !== NULL && array_search($this->originalShortcutPage, $uids) < $currentPage) {
			$this->originalShortcutPage = NULL;
		}
		if ($this->originalMountPointPage !== NULL && array_search($this->originalMountPointPage, $uids) < $currentPage) {
			$this->originalMountPointPage = NULL;
		}
	}
	
	/**
	 * We only want to handle this as a 404 if there is no alternative.
	 * Most of the time, we want to show the login form.
	 * If $this->TYPO3_CONF_VARS['FE']['pageNotFound_handling'] is not empty,
	 * this is not possible without this Xclass any more
	 */
	public function pageNotFoundAndExit($reason = '', $header = '') {
		if (!count($this->page)) {
			parent::pageNotFoundAndExit($reason = '', $header = '');
		}
	}
}
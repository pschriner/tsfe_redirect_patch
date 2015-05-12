<?php
namespace DieMedialen\TsfeRedirectPatch\Xclass;

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
		if ($this->originalShortcutPage !== NULL && array_search($this->originalShortcutPage) < $currentPage) {
			$this->originalShortcutPage = NULL;
		}
		if ($this->originalMountPointPage !== NULL && array_search($this->originalMountPointPage) < $currentPage) {
			$this->originalMountPointPage = NULL;
		}
	}
}
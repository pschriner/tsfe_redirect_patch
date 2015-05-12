<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController'] = array(
 'className' => 'DieMedialen\\TsfeRedirectPatch\\Xclass\\TypoScriptFrontendController'
);


?>
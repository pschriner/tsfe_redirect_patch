<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "tsfe_redirect_patch".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'TSFE redirect patch',
	'description' => 'Replacement for $GLOBALS[TSFE]',
	'category' => 'plugin',
	'author' => 'Patrick Schriner',
	'author_email' => 'patrick.schriner@diemedialen.de',
	'author_company' => 'Die Medialen GmbH',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>
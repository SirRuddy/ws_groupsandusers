<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Webschuppen.' . $_EXTKEY,
	'Pi1',
	array(
		'Groupanduser' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Groupanduser' => '',
		
	)
);

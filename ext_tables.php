<?php
 if (!defined('TYPO3_MODE')) {
	  die('Access denied.');
	  }

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin($_EXTKEY, 'Pi1', 'Groups and users');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Groups and users');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_wsgroupsandusers_domain_model_groupanduser', 'EXT:ws_groupsandusers/Resources/Private/Language/locallang_csh_tx_wsgroupsandusers_domain_model_groupanduser.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_wsgroupsandusers_domain_model_groupanduser');

$GLOBALS['TCA']['tx_wsgroupsandusers_domain_model_groupanduser'] = array(
		'ctrl' => array(
		'title'	=> 'LLL:EXT:ws_groupsandusers/Resources/Private/Language/locallang_db.xlf:tx_wsgroupsandusers_domain_model_groupanduser',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Groupanduser.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_wsgroupsandusers_domain_model_groupanduser.gif'
	),
);

?>
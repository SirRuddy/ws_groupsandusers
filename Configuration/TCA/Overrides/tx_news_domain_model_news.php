<?php
defined('TYPO3_MODE') or die();

$fields = array(
'fe_user' => array(
   'exclude' => 1,
   'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_users.username',
   'config' => array(
	  'type' => 'select',
	  'foreign_table' => 'fe_users',
	  'foreign_table_where' => 'ORDER BY fe_users.company',
	  'size' => 10,
	  'autoSizeMax' => 30,
	  'minitems' => 0,
	  'maxitems' => 1,
	 ),
   )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'fe_user');
?>
<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
if (TYPO3_MODE == 'BE') {
	$myextconf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['bw_backendsite']);
	


	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule($myextconf['menu']?$myextconf['menu']:'user', 'txbwbackendsiteM1', '', \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'mod1/');

	unset($myextconf);
}

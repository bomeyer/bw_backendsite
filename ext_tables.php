<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
if (TYPO3_MODE == 'BE') {
	$myextconf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['bw_backendsite']);
	
	if ($myextconf['pageID']) {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
			'BolandWerbung.BwBackendsite',
			$myextconf['menu']?$myextconf['menu']:'user',
			'm1',
			'',
			[
				'Module' => 'list'
			],
			[
				'access' => 'user,group',
				'icon' => $myextconf['icon'],
				'labels' => $myextconf['locallang'],
			]
		);
	}
	
	if ($myextconf['pageID_mod2']) {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
			'BolandWerbung.BwBackendsite',
			$myextconf['menu_mod2']?$myextconf['menu_mod2']:'system',
			'm2',
			'',
			[
				'Module2' => 'list'
			],
			[
				'access' => 'user,group',
				'icon' => $myextconf['icon_mod2'],
				'labels' => $myextconf['locallang_mod2'],
			]
		);
	}
	
	if ($myextconf['pageID_mod3']) {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
			'BolandWerbung.BwBackendsite',
			$myextconf['menu_mod3']?$myextconf['menu_mod3']:'tools',
			'm3',
			'',
			[
				'Module3' => 'list'
			],
			[
				'access' => 'user,group',
				'icon' => $myextconf['icon_mod3'],
				'labels' => $myextconf['locallang_mod3'],
			]
		);
	}
	
	unset($myextconf);
}

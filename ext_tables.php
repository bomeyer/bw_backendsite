<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
if (TYPO3_MODE == 'BE') {
	$myextconf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('bw_backendsite');
	
	if ($myextconf['pageID']) {
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
			'BolandWerbung.BwBackendsite',
			$myextconf['menu']?$myextconf['menu']:'user',
			'm1',
			'',
			[
                \BolandWerbung\BwBackendsite\Controller\ModuleController::class => 'index'
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
				\BolandWerbung\BwBackendsite\Controller\Module2Controller::class => 'index'
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
            \BolandWerbung\BwBackendsite\Controller\Module3Controller::class => 'index'
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

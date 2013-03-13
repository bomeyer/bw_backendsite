<?php

$myextconf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['bw_backendsite']);

	// DO NOT REMOVE OR CHANGE THESE 2 LINES:
$MCONF['name'] = $myextconf['menu']?$myextconf['menu']:'user'.'_txbwbackendsiteM1';
$MCONF['script'] = '_DISPATCH';
	
$MCONF['access'] = 'user,group';

$MLANG['default']['tabs_images']['tab'] = 'moduleicon.gif';
$MLANG['default']['ll_ref'] = 'LLL:EXT:bw_backendsite/mod1/locallang_mod.xml';

?>

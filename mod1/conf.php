<?php

$myextconf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['bw_backendsite']);

	// DO NOT REMOVE OR CHANGE THESE 2 LINES:
$MCONF['name'] = $myextconf['menu']?$myextconf['menu']:'user'.'_txbwbackendsiteM1';

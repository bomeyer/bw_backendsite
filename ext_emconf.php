<?php

########################################################################
# Extension Manager/Repository config file for ext "bw_backendsite".
#
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'BW Backend Site',
	'description' => 'Show part of the page tree in the backend',
	'category' => 'backend',
	'author' => 'Mark Boland',
	'author_email' => 'mark.boland@boland.de',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => 'mod1',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.1.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '8.7.0-9.99.99'
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	)
);

?>

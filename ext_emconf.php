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
	'version' => '1.2.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '10.0.0-11.4.99',
            'fluid_styled_content' => '10.0.0-11.4.99',
            'php' => '7.2.0-7.4.99'
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'autoload' => array(
		'psr-4' => array(
			'BolandWerbung\\BwBackendsite\\' => 'Classes'
		)
	)
);

<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015 Mark Boland <mark.boland@boland.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   57: class  tx_bwbackendsite_module1 extends t3lib_SCbase
 *   65:     function init()
 *   82:     function menuConfig()
 *  100:     function main()
 *  119:     function jumpToUrl(URL)
 *  169:     function printContent()
 *  180:     function moduleContent()
 *
 * TOTAL FUNCTIONS: 6
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

$LANG->includeLLFile('EXT:bw_backendsite/mod1/locallang.xml');
//require_once(PATH_t3lib . 'class.t3lib_scbase.php');
$BE_USER->modAccess($MCONF,1);	// This checks permissions and exits if the users has no permission for entry.
	// DEFAULT initialization of a module [END]



/**
 * Module 'BW Real Estate' for the 'bw_realestate' extension.
 *
 * @author	Mark Boland <mark.boland@boland.de>
 * @package	TYPO3
 * @subpackage	tx_bwrealestate
 */
class  tx_bwbackendsite_module1 extends t3lib_SCbase {
	var $pageinfo;
	var $storagePid;
	var $singlePID;
	var $downloadPID;
	var $typeNum;
	var $backPath;
	var $TSconfig;

	/**
	* Initializes the Module
	*
	* @return	void
	*/
	function init()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		parent::init();
		
		$this->extconf = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['bw_backendsite']); // , , 
		$this->url = dirname(dirname($_SERVER['PHP_SELF']));	// ../typo3
		
		$this->backPath = '../typo3/';

	}

	/**
	* Adds items to the ->MOD_MENU array. Used for the function menu selector.
	*
	* @return	void
	*/
	function menuConfig()	{
		global $LANG;
		$this->MOD_MENU = Array (
			'function' => Array (
				'1' => $LANG->getLL('mode.list'),
				'2' => $LANG->getLL('mode.references'),
				'3' => $LANG->getLL('mode.hidden'),
				'4' => $LANG->getLL('mode.import'),
			/*	'5' => $LANG->getLL('mode.maintainence'), */
			)
		);
		parent::menuConfig();
	}

	/**
	* Main function of the module. Write the content to $this->content
	* If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
	*
	* @return	[type]		...
	*/
	function main()	{
		global $BE_USER, $LANG, $BACK_PATH, $TCA_DESCR, $TCA, $CLIENT, $TYPO3_CONF_VARS;

		// Access check!
		// The page will show only if there is a valid page and if this page may be viewed by the user
		$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id, $this->perms_clause);
		$access = is_array($this->pageinfo) ? 1 : 0;

		header('Location: '.$this->url.'?id='.$this->extconf['pageID']);
		
		//$this->content = '<iframe style="width=100%;height=100%" src="'.$_SERVER['PHP_SELF'].'" />'.chr(10);
		return;
		
	}
	
	/**
	* Prints out the module HTML
	*
	* @return	void
	*/
	function printContent()	{

	//	$this->content .= $this->doc->endPage();
		echo $this->content;
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bw_backendsite/mod1/index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/bw_backendsite/mod1/index.php']);
}




// Make instance:
$SOBE = t3lib_div::makeInstance('tx_bwbackendsite_module1');
$SOBE->init();

// Include files?
foreach($SOBE->include_once as $INC_FILE)	include_once($INC_FILE);

$SOBE->main();
$SOBE->printContent();

?>

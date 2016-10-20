<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015, 2016 Mark Boland <mark.boland@boland.de>
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

use TYPO3\CMS\Backend\Module\BaseScriptClass;
use TYPO3\CMS\Backend\Utility\BackendUtility;


/**
 * Module 'BW Backendsite' for the 'bw_backendsite' extension.
 *
 * @author	Mark Boland <mark.boland@boland.de>
 * @package	TYPO3
 * @subpackage	tx_bwbackendsite
 */
class  tx_bwbackendsite_module1 extends TYPO3\CMS\Backend\Module\BaseScriptClass {
	/**
	 * @var array
	 */
	protected $pageinfo;
	
	var $backPath;
	var $TSconfig;

	/**
	 * @var \TYPO3\CMS\Core\Authentication\BackendUserAuthentication
	 */
	protected $backendUser;


	/**
	* Initializes the Module
	*
	* @return	void
	*/
	function init()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		parent::init();
		
		$this->extconf = unserialize($TYPO3_CONF_VARS['EXT']['extConf']['bw_backendsite']);
		$this->url = dirname(dirname($_SERVER['PHP_SELF']));	// ../typo3
		
		$this->backPath = '../typo3/';
		$this->backendUser = $GLOBALS['BE_USER'];

	}

	/**
	* Main function of the module. Write the content to $this->content
	* If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
	*
	* @return	[type]		...
	*/
	function main()	{
		global $BE_USER, $LANG, $BACK_PATH, $TCA_DESCR, $TCA, $CLIENT, $TYPO3_CONF_VARS;

		
		$id = $this->backendUser->userTS['plugin.']['tx_bwbackendsite.']['pageID']?$this->backendUser->userTS['plugin.']['tx_bwbackendsite.']['pageID']:$this->extconf['pageID'];

		if (intval($id) || !$id) {
			$id = $id?intval($id):1;
			// Access check!
			// The page will show only if there is a valid page and if this page may be viewed by the user
			//$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id, $this->perms_clause);
			$this->pageinfo = BackendUtility::readPageAccess(intval($id), $this->perms-clause);
			$access = is_array($this->pageinfo);
			if ($access || $this->backendUser->user['admin'])
				header('Location: '.$this->url.'index.php?id='.$id);
			else
				$this->content = 'You have no access to the preconfigured page. Please contact the administrator.';
		} elseif (preg_match('/^https?:\/\//', $id)) {
			$this->content = 'valid website url:'.$id;
			header('Location: '.$id);
		} else
			$this->content = 'The preconfigured page is not a valid web address. Please contact the administrator.';
		
		return;
		
	}
	
	/**
	* Prints out the module HTML
	*
	* @return	void
	*/
	function printContent()	{

		echo $this->content;
	}
}

$object = new tx_bwbackendsite_module1();
$object->init();
$object->main();
$object->printContent();
<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Mark Boland <mark.boland@boland.de>
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
require_once(PATH_t3lib . 'class.t3lib_scbase.php');
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
		
		//print_r($this->extconf);

	//	echo '<iframe style="width=100%;height=100%" src="'.$_SERVER['PHP_SELF'].'/?id='.$this->id.'" />';
		
	/*	$this->id = intval(t3lib_div::_GP('id'));
		$this->storagePid = $this->id;
		
		$pageTS = t3lib_BEfunc::getPagesTSconfig($this->id);
		$modTS = t3lib_BEfunc::getModTSconfig($this->id, '');
		$this->TSconfig = $pageTS['mod.']['web_txbwbackendsiteM1.'];
		
		$this->singlePID = intval($this->TSconfig['singlePID']);
		$this->downloadPID = intval($this->TSconfig['downloadPID']);
		$this->typeNum = intval($this->TSconfig['typeNum']);
		
		if (empty($this->TSconfig)) {
			require_once(PATH_t3lib.'class.t3lib_flashmessage.php');
			$message = t3lib_div::makeInstance('t3lib_FlashMessage', 
				'If this is the correct page, please tell your Administrator to set the correct pageTS for '.
				'BW Real Estate for preview and High-Res PDF generation', 
				'Missing configuration',
				t3lib_Flashmessage::WARNING,
				TRUE);
			
			echo $message->render();
		}
		*/
		$this->backPath = '../typo3/';

		/*
		if (t3lib_div::_GP('clear_all_cache'))	{
			$this->include_once[] = PATH_t3lib.'class.t3lib_tcemain.php';
		}
		*/
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
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;

		// Access check!
		// The page will show only if there is a valid page and if this page may be viewed by the user
		$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
		$access = is_array($this->pageinfo) ? 1 : 0;

		header('Location: '.$this->url.'?id='.$this->extconf['pageID']);
		
		//$this->content = '<iframe style="width=100%;height=100%" src="'.$_SERVER['PHP_SELF'].'" />'.chr(10);
		return;
		
		if ($this->id && $access) {
				// Draw the header.
			$this->doc = t3lib_div::makeInstance('mediumDoc');
			$this->doc->backPath = $BACK_PATH;
			$this->doc->form='<form action="" method="post" enctype="multipart/form-data">';
	
				// JavaScript
			$this->doc->JScode = '
				<script language="javascript" type="text/javascript">
					script_ended = 0;
					function jumpToUrl(URL)	{
						document.location = URL;
					}
				</script>
			';
			$this->doc->postCode='
				<script language="javascript" type="text/javascript">
					script_ended = 1;
					if (top.fsMod) top.fsMod.recentIds["web"] = 0;
				</script>
			';
	
			$headerSection = $this->doc->getHeader('pages',$this->pageinfo,$this->pageinfo['_thePath']).'<br />'.$LANG->sL('LLL:EXT:lang/locallang_core.xml:labels.path').': '.t3lib_div::fixed_lgd_pre($this->pageinfo['_thePath'],50);
	
			$this->content .= $this->doc->startPage($LANG->getLL('title'));
			$this->content .= $this->doc->header($LANG->getLL('title'));
			$this->content .= $this->doc->spacer(5);
			$this->content .= $this->doc->section('',$this->doc->funcMenu($headerSection,t3lib_BEfunc::getFuncMenu($this->id,'SET[function]',$this->MOD_SETTINGS['function'],$this->MOD_MENU['function'])));
			$this->content .= $this->doc->divider(5);
	
	
			// Render content:
			$this->moduleContent();
	
	
			// ShortCut
			if ($BE_USER->mayMakeShortcut())	{
				$this->content .= $this->doc->spacer(20).$this->doc->section('',$this->doc->makeShortcutIcon('id',implode(',',array_keys($this->MOD_MENU)),$this->MCONF['name']));
			}
	
			$this->content.=$this->doc->spacer(10);
		} else {
			$this->doc = t3lib_div::makeInstance('mediumDoc');
			$headerSection = $this->doc->getHeader('pages',$this->pageinfo,$this->pageinfo['_thePath']).'<br />'.$LANG->sL('LLL:EXT:lang/locallang_core.xml:labels.path').': '.t3lib_div::fixed_lgd_pre($this->pageinfo['_thePath'],50);
	
			$this->content .= $this->doc->startPage($LANG->getLL('title'));
			$this->content .= $this->doc->header($LANG->getLL('title'));
			$this->content .= $this->doc->spacer(5);
			$this->content .= $this->doc->section('',$this->doc->funcMenu($headerSection,t3lib_BEfunc::getFuncMenu($this->id,'SET[function]',$this->MOD_SETTINGS['function'],$this->MOD_MENU['function'])));
			$this->content .= $this->doc->divider(5);
		}
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

	/** Return HTML for import icons
	*
	*	@param string $table Database table to import to
	*	@param string $obID IS24 object ID
	*	@return string HTML code
	*/
	function makeImportControls($table, $objID) {
		t3lib_div::loadTCA($table);

		// "Import" link: ( Only if permissions to edit the page-record of the content of the parent page ($this->id)
		if ($this->getObjectByUuid(intval($objID))) {
			$params="&state=exposee&uuid=".$objID;
			$cells[]='<a href="#" onclick="jumpToUrl(\'mod.php?'.htmlspecialchars('M=web_txbwrealestateM1&id='.t3lib_div::_GP('id').$params).'\')">'.
					'<img'.t3lib_iconWorks::skinImg($this->backPath,'gfx/import_update'.(!$GLOBALS['TCA'][$table]['ctrl']['readOnly']?'':'_d').'.gif',
						' width="11" height="12"').' title="'.$GLOBALS['LANG']->getLLL('update',$this->LL).'" alt="" />'.
					'</a>'.chr(10);
		} else {		
			$params="&state=exposee&uuid=".$objID;
			$cells[]='<a href="#" onclick="jumpToUrl(\'mod.php?'.htmlspecialchars('M=web_txbwrealestateM1&id='.t3lib_div::_GP('id').$params).'\')">'.
					'<img'.t3lib_iconWorks::skinImg($this->backPath,'gfx/import'.(!$GLOBALS['TCA'][$table]['ctrl']['readOnly']?'':'_d').'.gif',
						' width="11" height="12"').' title="'.$GLOBALS['LANG']->getLLL('edit',$this->LL).'" alt="" />'.
					'</a>'.chr(10);
		}
		return implode('', $cells);
	}

	/**
	 * Creates the control panel for a single record in the listing.
	 *
	 * @param	string		The table
	 * @param	array		The record for which to make the control panel.
	 * @return	string		HTML table with the control panel (unless disabled)
	 */
	function makeControl($table, $row)	{
		global $TCA, $LANG;

			// Initialize:
		t3lib_div::loadTCA($table);
		$cells = array();
		
		//echo "BackPath:".$this->backPath;
		
		// HighRes-PDF export 
		if ($this->downloadPID) {
			$cells[] = $this->pdfCached($row['uid'], $row['sys_language_uid'], 90, 120, $row['tstamp']);
		}
		
		// View
		if ($this->singlePID) {
			$cells[]='<a href="#" onclick="'.htmlspecialchars(
				t3lib_BEfunc::viewOnClick($this->singlePID, $this->backPath, '', '', '', '&tx_bwrealestate_pi1[uid]='.$row['uid'])).'">'.
					'<img'.t3lib_iconWorks::skinImg($this->backPath,'gfx/magnifier'.(!$TCA[$table]['ctrl']['readOnly']?'':'_d').'.png',
						' width="16" height="16"').' title="'.$LANG->getLLL('view', $this->LL).'" alt="" />'.
					'</a>'.chr(10);
		}
		
		// "Edit" link: ( Only if permissions to edit the page-record of the content of the parent page ($this->id)
		$params='&edit['.$table.']['.$row['uid'].']=edit';
		$cells[]='<a href="#" onclick="'.htmlspecialchars(t3lib_BEfunc::editOnClick($params,$this->backPath,$this->returnUrl)).'">'.
				'<img'.t3lib_iconWorks::skinImg($this->backPath,'gfx/edit2'.(!$TCA[$table]['ctrl']['readOnly']?'':'_d').'.gif',
					' width="11" height="12"').' title="'.$LANG->getLLL('edit',$this->LL).'" alt="" />'.
				'</a>'.chr(10);

		// "Hide/Unhide" links:
		$hiddenField = $TCA[$table]['ctrl']['enablecolumns']['disabled'];
		if ($hiddenField && $TCA[$table]['columns'][$hiddenField] &&
				(!$TCA[$table]['columns'][$hiddenField]['exclude'] || $GLOBALS['BE_USER']->check('non_exclude_fields',$table.':'.$hiddenField)))	{
			if ($row[$hiddenField])	{
				$params='&data['.$table.']['.$row['uid'].']['.$hiddenField.']=0';
				$cells[]='<a href="#" onclick="'.htmlspecialchars('return jumpToUrl(\''.$this->issueCommand($params,$this->returnUrl).'\');').'">'.
						'<img'.t3lib_iconWorks::skinImg($this->backPath,'gfx/button_unhide.gif',
							'width="11" height="10"').' title="'.$LANG->getLLL('unHide',$this->LL).'" alt="" />'.
						'</a>'.chr(10);
			} else {
				$params='&data['.$table.']['.$row['uid'].']['.$hiddenField.']=1';
				$cells[]='<a href="#" onclick="'.htmlspecialchars('return jumpToUrl(\''.$this->issueCommand($params,$this->returnUrl).'\');').'">'.
						'<img'.t3lib_iconWorks::skinImg($this->backPath,'gfx/button_hide.gif',
							'width="11" height="10"').' title="'.$LANG->getLLL('hide',$this->LL).'" alt="" />'.
						'</a>'.chr(10);
			}
		}

		return '
				<!-- CONTROL PANEL: '.$table.':'.$row['uid'].' -->
				'.implode('',$cells);
	}

	
	/**
	 * Creates the control panel for a single record in the listing.
	 *
	 * @param	string		The table
	 * @param	array		The record for which to make the control panel.
	 * @return	string		HTML table with the control panel (unless disabled)
	 */
	function makeNewControl($table)	{
		$params = '&edit['.$table.']['.$this->storagePid.']=new';
		$onclick = htmlspecialchars(t3lib_BEfunc::editOnClick($params,$this->backPath,$this->returnUrl));
		$button = '<a href="#" onclick="'.$onclick.'">'.
			'<img'.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/new_el.gif').' title="'.$GLOBALS['LANG']->getLL('createCategory',1).'" alt="" /> '.
			'</a>';
		return $button;
	}

	/**
	 * delegate the command to TCE
	 *
	 * @param	[type]		$params: ...
	 * @param	[type]		$rUrl: ...
	 * @return	[type]		...
	 */
	function issueCommand($params,$rUrl='')	{
		$rUrl = $rUrl ? $rUrl : t3lib_div::getIndpEnv('REQUEST_URI');
		return $this->backPath.'tce_db.php?'.
				$params.
				'&redirect='.($rUrl==-1?"'+T3_THIS_LOCATION+'":rawurlencode($rUrl)).
				'&vC='.rawurlencode($GLOBALS['BE_USER']->veriCode()).
				'&prErr=1&uPT=1';
	}

	/**
	 * Get real estate object matching IS24 id
	 *
	 * @param	string	$uuid: IS24 object ID
	 * @return	array	object record if available
	 */
	function getObjectByUuid($uuid)	{
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'tx_bwrealestate_object', 'is24_uuid="'.trim(mysql_real_escape_string($uuid)).'"', '', '', '1');
		$content = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
		//if ($content)
		//	t3lib_div::debug(array('uuid' => $uuid, 'content' => $content));
		
		return $content;
	}

	/**
	 * Get array encoded as bitmap
	 *
	 * @param	array $f: array with values set
	 * @return	int		Bits encoded as integer (16 Bit)
	 */
	function encodeBits($f)	{
		for ($i = 0; $i < 16; $i++) {
			if ($f[$i] != false)
				$result += pow($i, 2);
		}
		
		return $result;
	}

	/**
	 * Parse some basic plain text features
	 *
	 * @param	string	$txt: Text to be parsed
	 * @return	string	HTML code
	 */
	function parseWiki($txt)	{
		$src = array(
			"/(€)/",
			"/()/",
			"/^- (.*)$/mU",
			"/^$/mU",
			"/\r\n\r\n/",
			"/\r\n/",
			
			"'(</ul>\n<ul>)'mU",
		);
		$dst = array(
			"&euro;",
			"&euro;",
			"<ul><li>$1</li></ul>",
			"</p><p>",
			"</p><p>",
			"<br/>",
			
			"",
		);
		$content = '<p>'.preg_replace($src, $dst, $txt).'</p>';
		
		return $content;
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

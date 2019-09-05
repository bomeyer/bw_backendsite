<?php

use TYPO3\CMS\Backend\Module\BaseScriptClass;
use TYPO3\CMS\Core\Utility\GeneralUtility;

namespace BolandWerbung\BwBackendsite\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019 Mark Boland <mark.boland@boland.de>, Boland Werbung
 *  
 *  All rights reserved
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class ModuleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
	public function listAction() {
		$this->extconf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('bw_backendsite');
		$this->prefix = dirname(dirname($_SERVER['PHP_SELF']));	// ../typo3
		
//		$this->backPath = '../typo3/';
		$this->backendUser = $GLOBALS['BE_USER'];
		
		$id = $this->backendUser->userTS['plugin.']['tx_bwbackendsite.']['pageID']?$this->backendUser->userTS['plugin.']['tx_bwbackendsite.']['pageID']:$this->extconf['pageID'];
		
		if (intval($id) || !$id) {	// if numeric or not set
			$id = $id?intval($id):1;	// a valid numeric or first page (uid = 1)
			// Access check!
			// The page will show only if there is a valid page and if this page may be viewed by the user
			//$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id, $this->perms_clause);
			$this->pageinfo = \TYPO3\CMS\Backend\Utility\BackendUtility::readPageAccess(intval($id), $this->perms->clause);
			$access = is_array($this->pageinfo);
			if ($access || $this->backendUser->user['admin']) {
				header('Location: '.($this->prefix !== '/'?$this->prefix:'').'/index.php?id='.$id);	// don't use '/', because '//' is a protocol ignorant website pointer
				exit;
			} else {
				$this->content = 'You have no access to the preconfigured page. Please contact the administrator.';
			}
		} elseif (preg_match('/^https?:\/\//', $id)) {	// valid URL
			$this->content = 'valid website url:'.$id;
			header('Location: '.$id);
			exit;
		} else {
			$this->content = 'The preconfigured page is not a valid web address. Please contact the administrator.';
		}
		
		$this->view->assign('error', $this->content);
		$this->view->assign('id', $id);
	}
}
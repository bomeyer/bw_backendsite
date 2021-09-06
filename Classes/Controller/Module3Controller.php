<?php

use TYPO3\CMS\Backend\Module\BaseScriptClass;

namespace BolandWerbung\BwBackendsite\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2019, 2021 Mark Boland <mark.boland@boland.de>
 *  
 *  All rights reserved
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class Module3Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
		
	public function indexAction() {
		$this->extconf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('bw_backendsite');
		$this->prefix = dirname(dirname($_SERVER['PHP_SELF']));	// ../typo3
		
		$this->backPath = '../typo3/';
		$this->backendUser = $GLOBALS['BE_USER'];
		
		$id = $this->backendUser->userTS['plugin.']['tx_bwbackendsite.']['module3.']['pageID']?$this->backendUser->userTS['plugin.']['tx_bwbackendsite.']['module3.']['pageID']:$this->extconf['pageID_mod3'];
		
		if (intval($id) || !$id) {
			$id = $id?intval($id):1;
			// Access check!
			// The page will show only if there is a valid page and if this page may be viewed by the user
			$this->pageinfo = \TYPO3\CMS\Backend\Utility\BackendUtility::readPageAccess(intval($id), $this->perms->clause);
			$access = is_array($this->pageinfo);
			if ($access || $this->backendUser->user['admin']) {
                $url = ($this->prefix !== '/'?$this->prefix:'').'/index.php?id='.$id;
			} else {
				$this->content = 'You have no access to the preconfigured page. Please contact the administrator.';
			}
		} elseif (preg_match('/^https?:\/\//', $id)) {
			$this->content = 'valid website url:'.$id;
            $url = $id;
		} else {
			$this->content = 'The preconfigured page is not a valid web address. Please contact the administrator.';
		}
		
		$this->view->assign('error', $this->content);
		$this->view->assign('url', $url);
	}
}
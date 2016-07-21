<?php
namespace Webschuppen\WsGroupsandusers\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Martin Hollmann <martin@webschuppen.com>, webschuppen GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * GroupanduserController
 */
class GroupanduserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * groupanduserRepository
	 * 
	 * @var \Webschuppen\WsGroupsandusers\Domain\Repository\GroupanduserRepository
	 * @inject
	 */
	protected $groupanduserRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
        if( !empty($this->settings['groupid']) ) $groupid = intval($this->settings['groupid']);
        else $groupid = null;

        $groupsAndUsersArr = array();

        // find all fe_groups
		$groupandusers = $this->groupanduserRepository->findGroupsRaw($groupid);
        $numberOfGroups = count($groupandusers);

        for($x=0; $x<$numberOfGroups; $x++) {
            // find all fe_users by fe_groups id
            $users = $this->groupanduserRepository->findUsersByGroupRaw( $groupandusers[$x]['uid'] );
            $groupsAndUsersArr[$x] = array();
            $groupsAndUsersArr[$x]['title'] = $groupandusers[$x]['title'];
            $groupsAndUsersArr[$x]['users'] = array();
            $groupsAndUsersArr[$x]['users'] = $users;
        }

		$this->view->assign('groupandusers', $groupsAndUsersArr);
	}

	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction() {
        if( $this->request->hasArgument('item') ) {
            $user = $this->groupanduserRepository->findUserRaw( $this->request->getArgument('item') );
            $this->view->assign('user', $user[0]);
        }
        else {
            echo "No item ID in request!";
            exit();
        }
	}

}
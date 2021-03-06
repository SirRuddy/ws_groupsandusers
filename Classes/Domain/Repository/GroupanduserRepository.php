<?php
namespace Webschuppen\WsGroupsandusers\Domain\Repository;


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
 * The repository for Groupandusers
 */
class GroupanduserRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    public function findGroupsRaw($groupId=null){
        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(TRUE);

        if($groupId==null || $groupId < 1) $query->statement('SELECT * from fe_groups WHERE hidden=0 AND deleted=0');
        else $query->statement('SELECT * from fe_groups WHERE uid='.$groupId.' AND hidden=0 AND deleted=0');

        return $query->execute();
    }

    public function findUserRaw($userId){
        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $query->statement('SELECT * from fe_users WHERE uid = '.$userId.' AND disable=0 AND deleted=0');
        return $query->execute();
    }

    public function findUsersByGroupRaw($groupId){
        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $query->statement('SELECT * from fe_users WHERE usergroup = '.$groupId.' AND disable=0 AND deleted=0');
        return $query->execute();
    }
}

/**
 * The repository for News
 */
/*class Tx_News_Domain_Model_News extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
		public function findInNews(Tx_News_Domain_Model_News $userId) {
		$query = $this->createQuery();
		$query->matching($query->contains('fe_user', $userId));
		return $query->execute();
	}
}*/
<?php
namespace Webschuppen\WsGroupsandusers\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Martin Hollmann <martin@webschuppen.com>, webschuppen GmbH
 *  			
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
 * Test case for class Webschuppen\WsGroupsandusers\Controller\GroupanduserController.
 *
 * @author Martin Hollmann <martin@webschuppen.com>
 */
class GroupanduserControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Webschuppen\WsGroupsandusers\Controller\GroupanduserController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Webschuppen\\WsGroupsandusers\\Controller\\GroupanduserController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllGroupandusersFromRepositoryAndAssignsThemToView() {

		$allGroupandusers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$groupanduserRepository = $this->getMock('Webschuppen\\WsGroupsandusers\\Domain\\Repository\\GroupanduserRepository', array('findAll'), array(), '', FALSE);
		$groupanduserRepository->expects($this->once())->method('findAll')->will($this->returnValue($allGroupandusers));
		$this->inject($this->subject, 'groupanduserRepository', $groupanduserRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('groupandusers', $allGroupandusers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenGroupanduserToView() {
		$groupanduser = new \Webschuppen\WsGroupsandusers\Domain\Model\Groupanduser();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('groupanduser', $groupanduser);

		$this->subject->showAction($groupanduser);
	}
}

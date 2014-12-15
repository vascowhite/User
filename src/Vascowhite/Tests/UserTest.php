<?php
/*
    Copyright (C) 2014  Paul White

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * User: Paul White
 * Date: 30/11/2014
 * 
 * File: UserTest.php
 * @package user
 */
 
 /**
  * @package 
  */

namespace Vascowhite\User\Tests;
use Vascowhite\User\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    private $mockSession;

    protected function setUp()
    {
        $this->mockSession = $this->getMockBuilder('Arya\Sessions\Session')->disableOriginalConstructor()->getMock();
    }

    public function testCanInstantiate()
    {
        $testUser = new User($this->mockSession);
        $this->assertInstanceOf('Vascowhite\User\User', $testUser, 'Could not instantiate');
    }

    public function testCanTellIfUserNotLoggedInWhenKeyExists()
    {
        $testUser = new User($this->mockSession);
        $this->mockSession->expects($this->once())->method('has')->with('loggedIn')->willReturn(true);
        $this->mockSession->expects($this->once())->method('get')->with('loggedIn')->willReturn(false);
        $this->assertFalse($testUser->isLoggedIn(), 'Could not assert not logged in');
    }

    public function testCanTellIfUserNotLoggedInWhenKeyDoesNotExist()
    {
        $testUser = new User($this->mockSession);
        $this->mockSession->expects($this->once())->method('has')->with('loggedIn')->willReturn(false);
        $this->assertFalse($testUser->isLoggedIn(), 'Could not assert not logged in');
    }

    public function testCanTellIfUserLoggedIn()
    {
        $this->mockSession->expects($this->once())->method('has')->with('loggedIn')->willReturn(true);
        $this->mockSession->expects($this->once())->method('get')->with('loggedIn')->willReturn(true);
        $testUser = new User($this->mockSession);
        $this->assertTrue($testUser->isLoggedIn(), 'Could not assert logged in');
    }

    public function testCanLogInUser()
    {
        $mockChecker = $this->getMockBuilder('Vascowhite\User\ICredentialChecker')->getMock();
        $mockChecker->expects($this->once())->method('checkCredentials')->willReturn(true);

        $credentials = ['username', 'password'];

        $testUser = new User($this->mockSession);
        $this->assertTrue($testUser->login($mockChecker, $credentials), 'Could not login user');
    }

    public function testCanRejectUser()
    {
        $mockChecker = $this->getMockBuilder('Vascowhite\User\ICredentialChecker')->getMock();
        $mockChecker->expects($this->once())->method('checkCredentials')->willReturn(false);

        $credentials = ['username', 'password'];

        $testUser = new User($this->mockSession);
        $this->assertFalse($testUser->login($mockChecker, $credentials), 'Could not reject user');
    }
}
 
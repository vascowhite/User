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
    public function testCanInstantiate()
    {
        $testUser = new User();
        $this->assertInstanceOf('Vascowhite\User\User', $testUser, 'Could not instantiate');
    }
}
 
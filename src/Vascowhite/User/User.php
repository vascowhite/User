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
 * File: User.php
 * @package user
 */
 
 /**
  * @package 
  */

namespace Vascowhite\User;
use Arya\Sessions\Session;

class User
{
    /** @var  Session */
    private $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @return bool
     */
    public function isLoggedIn()
    {
        if($this->session->has('loggedIn') && $this->session->get('loggedIn')){
            return true;
        }
        return false;
    }

    /**
     * @param CredentialChecker $credentialChecker
     * @param array $credentials
     * @return bool
     */
    private function checkCredentials(CredentialChecker $credentialChecker, array $credentials)
    {
        return $credentialChecker->checkCredentials($credentials);
    }

    /**
     * @param CredentialChecker $credentialChecker
     * @param array $credentials
     * @return bool
     */
    public function login(CredentialChecker $credentialChecker, array $credentials)
    {
        if($this->checkCredentials($credentialChecker, $credentials)){
            $this->session->set('loggedIn', true);
            return true;
        }
        return false;
    }
} 
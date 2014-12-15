User
===========

A simple class for authorising users.
Credentials are checked by passing any object that implements the `ICredentialChecker` interface.

##Installation

Install using composer, add the following to composer.json:-

```json
"require": {
    "vascowhite/user": "*"
}
```

##Requires
[Arya](https://github.com/rdlowrey/Arya).

###User

####User::__construct()
__Signature__
```php
User __construct(Arya\Sessions\Session);
```

__Arguments__
An Arya sesion object.

####User::isLoggedIn()
__Signature__
```php
Bool isLoggedIn()
```

__Arguments__
None

__Returns__
True if user is logged in, false otherwise.

####User::logIn()
__Signature__
```php
Bool logIn(ICredentialChecker, Array ['username', 'password'])
```

__Arguments__
`ICredentialChecker` an object implementing the `ICredentialChecker` interface.  
`Array` A PHP array with user name at index 0 and user password at index 1.

__Returns__
True if user is successfully logged in, false otherwise.

---
###ICredentialChecker
An interface for checking credentials.

####ICredentialChecker::checkCredentials()
__Signature__
```php
Bool checkCredentials(Array  ['username', 'password']);
```

__Arguments__
`Array` A PHP array with user name at index 0 and user password at index 1.

__Returns__
True if user credentials are accepted, false otherwise

---
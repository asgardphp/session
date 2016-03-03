#Data

[![Build Status](https://travis-ci.org/asgardphp/session.svg?branch=master)](https://travis-ci.org/asgardphp/session)

Session is a package for custom PHP session drivers.

- [Installation](#installation)
- [Initialisation](#initialisation)

<a name="installation"></a>
##Installation
**If you are working on an Asgard project you don't need to install this library as it is already part of the standard libraries.**

	composer require asgard/session 0.*

<a name="initialisation"></a>
##Initialisation

Add the following code in app/bootstrap_*.php:

	$session = new \Asgard\Session\DBSession($container['db']);
	$session->handle();

###Contributing

Please submit all issues and pull requests to the [asgardphp/asgard](http://github.com/asgardphp/asgard) repository.

### License

The Asgard framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
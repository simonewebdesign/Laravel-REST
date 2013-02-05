# Laravel-REST

A demo implementation of the Ruby on Rails RESTful architecture, built in Laravel. This demo app is complete of documentation ~~and a PHPUnit test suite~~ (not yet).


# Installation

1.  Check the Laravel [requirements](http://laravel.com/docs/install#requirements).

2.  Clone the repo:

        $ git clone https://github.com/simonewebdesign/Laravel-REST.git

3.  Create the `laravelrest` database:

        $ mysql -u root
        Welcome to the MySQL monitor.  Commands end with ; or \g.
    
        mysql> create database laravelrest;
        Query OK, 1 row affected (0.00 sec)

4.  Create the laravel migration table (if you haven't already done):

        $ php artisan migrate:install
        Migration table created successfully.

5.  Run the migrations:

        $ php artisan migrate
        Migrated: application/2013_01_19_162009_create_companies_table
        ...

#[Laravel](http://laravel.com) - A PHP Framework For Web Artisans

Laravel is a clean and classy framework for PHP web development. Freeing you
from spaghetti code, Laravel helps you create wonderful applications using
simple, expressive syntax. Development should be a creative experience that you
enjoy, not something that is painful. Enjoy the fresh air.

[Official Website & Documentation](http://laravel.com)

## Feature Overview

- Simple routing using Closures or controllers.
- Views and templating.
- Driver based session and cache handling.
- Database abstraction with query builder.
- Authentication.
- Migrations.
- PHPUnit Integration.
- A lot more.

## A Few Examples

### Hello World:

```php
<?php

Route::get('/', function()
{
	return "Hello World!";
});
```

### Passing Data To Views:

```php
<?php

Route::get('user/(:num)', function($id)
{
	$user = DB::table('users')->find($id);

	return View::make('profile')->with('user', $user);
});
```

### Redirecting & Flashing Data To The Session:

```php
<?php

return Redirect::to('profile')->with('message', 'Welcome Back!');
```

## Contributing to Laravel

Contributions are encouraged and welcome; however, please review the Developer
Certificate of Origin in the "license.txt" file included in the repository. All
commits must be signed off using the `-s` switch.

```bash
git commit -s -m "this commit will be signed off automatically!"
```

## License

Laravel is open-sourced software licensed under the MIT License.

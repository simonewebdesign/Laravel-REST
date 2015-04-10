# Laravel-REST

A demo implementation of the Ruby on Rails RESTful architecture, built in Laravel. This demo app is complete of documentation ~~and a PHPUnit test suite~~ (not yet).

## Installation

4 easy steps:

1.  Check the Laravel [requirements](http://laravel.com/docs/install#requirements);

2.  Clone the repo:

        $ git clone git://github.com/simonewebdesign/Laravel-REST.git

3.  Create the `laravelrest` database:

        $ mysql -uroot
        Welcome to the MySQL monitor.  Commands end with ; or \g.

        mysql> create database laravelrest;
        Query OK, 1 row affected (0.00 sec)

4.  Run the migrations:

        $ php artisan migrate:install
        Migration table created successfully.
        $ php artisan migrate
        Migrated: application/2013_01_19_162009_create_companies_table
        Migrated: application/2013_02_05_154929_add_description_to_company.php
        ...


## License

Laravel is open-sourced software licensed under the MIT License.

Laravel-REST is open-sourced software licensed under the WTFPL License.

See LICENSE.md for more.

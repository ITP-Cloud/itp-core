# itp-core

The itp-core application is built using CodeIgniter 4. 

### What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

### Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

### Installation & updates

Begin by clonning this repository to your machine. Then run the command `composer install` in the project root directory to get all the project dependencies then `composer update` whenever there is a new release of the framework or updates to the dependencies.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

### Setup

Copy `env` to `.env` and tailor for your app. This file will be used to provide environment variables for our application, i.e. database settings.

### Database Initialization

To set up the database on your machine, follow the following steps:

1. From phpMyAdmin (XAMMP or WAMP) or the terminal, create a database with the name `itp_core`
2. Edit the `.env` file in the project root directory to now contain database credentials relative to your workspace configurations.
3. Scaffold the project database schema by running the database migrations. Execute the command `php spark migrate -all` from your terminal in the project root directory


### Run the Development Server

To kick start development, execute the command `php spark serve` to run the project.

### Need Help?

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

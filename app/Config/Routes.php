<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');

$routes->group('console', ['namespace' => 'App\Controllers\DevConsole'], static function ($routes) {

  $routes->get('/', 'DevConsoleController::index');

  $routes->group('databases', static function ($routes) {
    $routes->get('/', 'DatabaseManagementController::getDatabases');

    $routes->get('new', 'DatabaseManagementController::newDatabase');
    $routes->post('new', 'DatabaseManagementController::newDatabaseAJAX'); // AJAX oriented route

    $routes->get('delete/(:num)', 'DatabaseManagementController::deleteDatabase/$1');
    $routes->post('delete/(:num)', 'DatabaseManagementController::deleteDatabaseAJAX/$1'); // AJAX oriented route

    $routes->get('phpmyadmin', 'DatabaseManagementController::getPhpMyAdmin');
  });

  $routes->group('websites', static function ($routes) {
    $routes->get('/', 'WebsiteManagementController::getWebsites');
    $routes->get('website/(:num)', 'WebsiteManagementController::getWebsite/$1');

    $routes->get('new', 'WebsiteManagementController::newWebsite');
    $routes->post('new', 'WebsiteManagementController::newWebsiteAJAX'); // AJAX oriented route

    $routes->get('edit/(:num)', 'WebsiteManagementController::editWebsite/$1');
    $routes->post('edit/(:num)', 'WebsiteManagementController::editWebsiteAJAX/$1'); // AJAX oriented route

    $routes->match(['get', 'post'], 'delete/(:num)', 'WebsiteManagementController::deleteWebsite/$1');
    $routes->post('delete/(:num)', 'WebsiteManagementController::deleteWebsiteAJAX/$1'); // AJAX oriented route
  });

  $routes->group('file-management', static function ($routes) {
    $routes->get('/', 'FileManagementController::getManagers');
    $routes->get('file-browser', 'FileManagementController::getFileBrowser');
  });
});

$routes->group('kyc', ['namespace' => 'App\Controllers'], static function ($routes) {
  $routes->get('/', 'KycController::showKyc');
  $routes->post('/', 'KycController::submitKycInfo');
  $routes->get('await', 'KycController::showAwaitingKycVerification');
});

$routes->get('login', 'Auth\LoginController::loginView');
$routes->get('register', 'Auth\RegisterController::registerView');

service('auth')->routes($routes);

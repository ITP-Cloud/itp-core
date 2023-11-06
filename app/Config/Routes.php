<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('websites', 'Home::getWebsites');
$routes->get('about', 'Home::about');

$routes->group(
  'console',
  ['namespace' => 'App\Controllers\DevConsole', 'filter' => 'group:user'],
  static function ($routes) {

    $routes->get('/', 'DevConsoleController::index');

    $routes->group('databases', ['namespace' => 'App\Controllers\DevConsole', 'filter' => 'group:user'], static function ($routes) {
      $routes->get('/', 'DatabaseManagementController::getDatabases');
      $routes->post('new', 'DatabaseManagementController::newDatabase');
      $routes->get('delete/(:num)', 'DatabaseManagementController::deleteDatabase/$1');
      $routes->post('delete/(:num)', 'DatabaseManagementController::deleteDatabaseAJAX/$1'); // AJAX oriented route
    });

    $routes->group('websites', ['namespace' => 'App\Controllers\DevConsole', 'filter' => 'group:user'], static function ($routes) {
      $routes->get('/', 'WebsiteManagementController::getWebsites');
      $routes->get('website/(:num)', 'WebsiteManagementController::getWebsite/$1');

      $routes->get('new', 'WebsiteManagementController::newWebsite');
      $routes->post('new', 'WebsiteManagementController::newWebsiteAJAX'); // AJAX oriented route

      $routes->get('edit/(:num)', 'WebsiteManagementController::editWebsite/$1');
      $routes->post('edit/(:num)', 'WebsiteManagementController::editWebsiteAJAX/$1'); // AJAX oriented route

      $routes->match(['get', 'post'], 'delete/(:num)', 'WebsiteManagementController::deleteWebsite/$1');
      $routes->post('delete/(:num)', 'WebsiteManagementController::deleteWebsiteAJAX/$1'); // AJAX oriented route
    });

    $routes->group('file-management', ['namespace' => 'App\Controllers\DevConsole', 'filter' => 'group:user'], static function ($routes) {
      $routes->get('/', 'FileManagementController::getManagers');
      $routes->get('file-browser', 'FileManagementController::getFileBrowser');
    });
  }
);

$routes->group('kyc', ['namespace' => 'App\Controllers\Auth'], static function ($routes) {
  $routes->get('/', 'KycController::showKyc');
  $routes->post('submit', 'KycController::submitKycInfo');
  $routes->get('await', 'KycController::showAwaitingKycVerification');
});

$routes->group(
  'moderator-console',
  ['namespace' => 'App\Controllers\ModeratorConsole', 'filter' => 'group:superadmin'],
  static function ($routes) {

    $routes->get('/', 'ModeratorDashboardController::index');
    $routes->get('websites', 'ModeratorDashboardController::getWebsites');
    $routes->get('website', 'ModeratorDashboardController::getWebsite/$1');

    $routes->get('databases', 'ModeratorDashboardController::getDatabases');
    $routes->get('database/(:num)', 'ModeratorDashboardController::getDatabase/$1');

    $routes->group('user-management', ['namespace' => 'App\Controllers\ModeratorConsole', 'filter' => 'group:superadmin'], static function ($routes) {
      $routes->get('/', 'UserManagementController::getUsers');
      $routes->get('user/(:num)', 'UserManagementController::getUser/$1');

      $routes->get('kyc', 'UserManagementController::getKycApprovals');
      $routes->get('kyc/(:num)', 'UserManagementController::getKycUserDetails/$1');

      $routes->post('approve', 'UserManagementController::approveUser');
      $routes->post('reject', 'UserManagementController::rejectUser');
      $routes->post('resubmit', 'UserManagementController::requestResubmitKyc');
    });
  }
);

$routes->get('login', 'Auth\LoginController::loginView');
$routes->get('register', 'Auth\RegisterController::registerView');

service('auth')->routes($routes);

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/', 'Home::index');
$routes->post('register', 'Register::index');
$routes->post('login', 'Login::index');
$routes->post('user/update/(:segment)', 'Register::update/$1', ['filter' => 'auth']);
$routes->post('user/updatePassword/(:segment)', 'Register::updatePassword/$1', ['filter' => 'auth']);
$routes->post('user/updateAvatar/(:segment)', 'Register::updateAvatar/$1', ['filter' => 'auth']);
$routes->get('me', 'Me::index');
$routes->get('avatar/(:segment)', 'login::showAvatar/$1');
$routes->get('handphone', 'Handphone::index');
$routes->get('handphone/(:segment)', 'Handphone::show/$1');
$routes->get('handphone/photo/(:segment)', 'Handphone::showPhonePhoto/$1');
$routes->get('phone_photo/(:segment)', 'Handphone::showPhonePhoto/$1');
$routes->post('createHP', 'Handphone::create', ['filter' => 'authadmin']);
$routes->post('handphone/update/(:segment)', 'Handphone::update/$1', ['filter' => 'auth']);
$routes->delete('handphone/delete/(:segment)', 'Handphone::delete/$1', ['filter' => 'authadmin']);
// $routes->resource('handphone');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
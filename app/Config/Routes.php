<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Guest');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// --------------- ADMIN
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/login', 'Admin::login');
$routes->get('/admin/logout', 'Admin::logout');

$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/food_list', 'Admin::food_list');
$routes->get('/admin/food_form', 'Admin::food_form');
$routes->get('/admin/order_list', 'Admin::order_list');
$routes->get('/admin/order_list_detail', 'Admin::order_list_detail');
$routes->get('/admin/guest_list', 'Admin::guest_list');
$routes->get('/admin/settings', 'Admin::settings');

$routes->get('/admin/food_list_detail', 'Admin::food_list_detail');
$routes->get('/admin/food_list_edit', 'Admin::food_list_edit');
$routes->get('/admin/food_form_add', 'Admin::food_form_add');
$routes->get('/admin/order_form_action', 'Admin::order_form_action');
$routes->get('/admin/guest_list_do_pay', 'Admin::guest_list_do_pay');
$routes->get('/admin/change_password', 'Admin::change_password');

// --------------- GUEST
$routes->get('/', 'Guest::index');
$routes->get('/aboutus', 'Guest::aboutUs');

$routes->get('/guest/food_cards', 'Guest::food_cards');

$routes->get('/guest/food_cards_detail', 'Guest::food_cards_detail');
$routes->get('/guest/food_form_do_order', 'Guest::food_form_do_order');

$routes->get('/guest/finish', 'Guest::finish');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

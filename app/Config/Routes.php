<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function($message){
	echo view('404', ['message' => $message]);
});
$routes->setAutoRoute(true);
$routes->get('logistika/index', 'Logistika::index', ['filter' => 'permission:logistika_view']);
$routes->get('itservis/index', 'ITServis::index', ['filter' => 'permission:itservis_view']);
$routes->get('activity/index', 'Activity::index');
$routes->get('tiketi/add', 'Tiketi::add', ['filter' => 'permission:ticket_create']);
$routes->post('tiketi/add', 'Tiketi::attemptsavenew', ['filter' => 'permission:ticket_create']);
$routes->get('staff/add', 'Staff::add', ['filter' => 'role:webmaster']);
$routes->post('staff/add', 'Staff::attemptsavenew', ['filter' => 'role:webmaster']);
$routes->get('service/add', 'Services::add', ['filter' => 'role:webmaster']);
$routes->post('service/add', 'Services::attemptsavenew', ['filter' => 'role:webmaster']);
$routes->get('settings/update', 'Settings::index');
$routes->post('settings/update', 'Settings::update');

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

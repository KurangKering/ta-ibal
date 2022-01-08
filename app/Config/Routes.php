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
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');



$routes->get('deskripsi', 'DeskripsiController::index');
$routes->get('deskripsi/show', 'DeskripsiController::show');
$routes->get('deskripsi/show_all', 'DeskripsiController::show_all');
$routes->post('deskripsi/create_or_update', 'DeskripsiController::create_or_update');
$routes->post('deskripsi/create', 'DeskripsiController::create');
$routes->get('deskripsi/edit', 'DeskripsiController::edit');
$routes->post('deskripsi/update', 'DeskripsiController::update');
$routes->get('deskripsi/delete', 'DeskripsiController::delete');

$routes->get('data-master', 'DataMasterController::index');
$routes->get('data-master/show', 'DataMasterController::show');
$routes->get('data-master/show_all', 'DataMasterController::show_all');
$routes->post('data-master/create_or_update', 'DataMasterController::create_or_update');
$routes->post('data-master/create', 'DataMasterController::create');
$routes->get('data-master/edit', 'DataMasterController::edit');
$routes->post('data-master/update', 'DataMasterController::update');
$routes->get('data-master/delete', 'DataMasterController::delete');

$routes->get('pengujian', 'PengujianController::index');
$routes->post('pengujian/uji', 'PengujianController::uji');
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

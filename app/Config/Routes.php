<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', function() {
    return view('landing-page');
});

$routes->get('/home', 'HomeController::index',['as' => 'home']);
$routes->get('/login', 'LoginController::index',['as' => 'login']);

// => default controller
$routes->get('/dashboard', 'DashboardController::index',['as' => 'dashboard']);

$routes->get('/jadwal', 'JadwalController::index',['as' => 'jadwal']);
$routes->get('/jadwal/edit/(:num)', 'JadwalController::edit/$1',['as' => 'jadwal-edit']);
$routes->get('/jadwal/delete/(:num)', 'JadwalController::delete/$1',['as' => 'jadwal-delete']);
$routes->get('/jadwal/create', 'JadwalController::create',['as' => 'jadwal-create']);
$routes->post('/jadwal/store', 'JadwalController::store',['as' => 'jadwal-store']);
$routes->post('/jadwal/update', 'JadwalController::update',['as' => 'jadwal-update']);

$routes->get('/buku', 'BukuController::index',['as' => 'buku']);
$routes->get('/buku/edit/(:num)', 'BukuController::edit/$1',['as' => 'buku-edit']);
$routes->get('/buku/delete/(:num)', 'BukuController::delete/$1',['as' => 'buku-delete']);
$routes->get('/buku/create', 'BukuController::create',['as' => 'buku-create']);
$routes->post('/buku/store', 'BukuController::store',['as' => 'buku-store']);
$routes->post('/buku/update', ' BukuController::update',['as' => 'buku-update']);


$routes->get('/guru', 'GuruController::index',['as' => 'guru']);
$routes->get('/guru/edit/(:num)', 'GuruController::edit/$1',['as' => 'guru-edit']);
$routes->get('/guru/delete/(:num)', 'GuruController::delete/$1',['as' => 'guru-delete']);
$routes->get('/guru/create', 'GuruController::create',['as' => 'guru-create']);
$routes->post('/guru/store', 'GuruController::store',['as' => 'guru-store']);
$routes->post('/guru/update', 'GuruController::update',['as' => 'guru-update']);

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

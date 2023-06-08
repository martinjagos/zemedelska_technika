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
$routes->get('/', 'Home::index');
$routes->get('domu', 'Main::metoda1');
$routes->get('kontakty', 'Main::metoda2');
$routes->get('galerie', 'Main::metoda3');

$routes->get('hraci', 'Main::limitPlayers');
$routes->get('hrac/(:num)', 'Main::metoda4/$1');


$routes->get('komponenty/novaKategorie', 'Shop::newCategory');
$routes->get('komponenty/upravitKategorie/(:any)', 'Shop::editCategory/$1');
$routes->get('komponenty/prehledKategorii', 'Shop::prehledKategorii');

$routes->post('komponenty/vytvoritKategorii', 'Shop::createCategory');
$routes->put('komponenty/upravitKategorie/upravitKategorii', 'Shop::editCategoryMethod');
$routes->delete('komponenty/smazatKategorii/(:any)', 'Shop::deleteCategory/$1');


$routes->get('komponenty/prehledKomponent', 'Shop::prehledKomponent');
$routes->get('komponenty/novaKomponenta', 'Shop::newComponent');
$routes->post('komponenty/vytvoritKomponent', 'Shop::createComponent');


$routes->get('komponenty/', 'Shop::komponenty');
$routes->get('komponenty/(:any)', 'Shop::kategorie/$1');

$routes->get('komponent/(:num)', 'Shop::product/$1');


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

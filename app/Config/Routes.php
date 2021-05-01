<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');
$routes->get('/admin', 'Admin::admin');
$routes->get('/profil', 'Profil::index');
$routes->get('/informasi_hukum/produk_hukum', 'Produk_hukum::index');
$routes->get('/informasi_hukum/propemperda', 'Propemperda::index');
$routes->get('/informasi_hukum/raperda', 'Raperda::index');
$routes->get('/informasi_hukum/naskah_akademik', 'Naskah_akademik::index');
$routes->get('/informasi_hukum/konsultasi_hukum', 'Konsultasi::index');
$routes->get('/informasi_hukum/perdes', 'Perdes::index');
$routes->get('/berita', 'Berita::index');
$routes->get('/login', 'Admin::login');
$routes->get('/admin', 'Admin::index');
$routes->get('/logout', 'Admin::logout');
$routes->get('/produk_hukum/add', 'Produk_hukum::input');
$routes->get('/produk_hukum/input_tte', 'Produk_hukum::input_tte');
$routes->get('/produk_hukum/tampil', 'Produk_hukum::tampil');
$routes->get('/produk_hukum/edit/(:segment)', 'Produk_hukum::edit/$1');
$routes->get('/produk_hukum/kategori/(:num)', 'Produk_hukum::kategori/$1');
$routes->delete('/produk_hukum/(:num)', 'Produk_hukum::delete/$1');
$routes->get('/peraturan/(:segment)', 'Produk_hukum::preview/$1');
$routes->get('/perdes/add', 'Perdes::input');
$routes->get('/perdes/tampil', 'Perdes::tampil');
$routes->get('/perdes/edit/(:num)', 'Perdes::edit/$1');
$routes->get('/perdes/(:num)', 'Perdes::delete/$1');
$routes->get('/perdes/desa/(:segment)', 'Perdes::desa/$1');
$routes->get('/berita/add', 'Berita::input');
$routes->get('/berita/edit/(:num)', 'Berita::edit_berita/$1');
$routes->get('/berita/tampil', 'Berita::tampil');
$routes->get('/raperda/tampil', 'Raperda::tampil');
$routes->get('/raperda/add', 'Raperda::input');
$routes->get('/raperda/edit_raperda', 'Raperda::edit_raperda/$1');
$routes->get('/raperda/read/(:any)', 'Raperda::preview/$1');
$routes->get('/naskah_akademik/tampil', 'Naskah_akademik::tampil');
$routes->get('/naskah_akademik/add', 'Naskah_akademik::input');
$routes->get('/naskah_akademik/edit_naskah', 'Naskah_akademik::edit_naskah/$1');
$routes->get('/berita/read/(:any)', 'Berita::detail/$1');
$routes->get('/berita/publikasi/(:num)', 'Berita::publikasi/$1');
$routes->get('/user/tampil', 'User::index');
$routes->get('/user/add', 'User::input');
$routes->get('/user/(:num)', 'User::delete/$1');

$routes->post('produk_hukum/ttd_ok', 'Produk_hukum::ttd_ok');

/**
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

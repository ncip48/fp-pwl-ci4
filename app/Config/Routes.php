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
$routes->get('/', 'Home::index');
$routes->get('/auth', 'Auth::index', ['filter' => 'loginGuard']);
$routes->post('/auth/login', 'Auth::login');
$routes->get('/mahasiswa', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/program', 'Program::index');
$routes->get('/program/(:any)', 'Program::detail/$1');
$routes->get('/kegiatanku', 'Kegiatan::index', ['filter' => 'authGuard']);

$routes->get('/mahasiswa/dashboard', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/signature', 'Signature::index');
$routes->get('/verify/(:any)', 'Signature::verify/$1');
$routes->get('/pdf', 'Pdf::index');
$routes->get('/akun', 'Akun::index');
$routes->get('/logout', 'Auth::logout');

//experimental
$routes->get('api/pdf/convert/(:any)', 'Api\Pdf::convert/$1');
$routes->get('api/pdf/convert', 'Api\Pdf::newConvert');
$routes->get('api/savehtml/', 'Api\Pdf::saveHtmlToMysql');
$routes->get('showhtml', 'Api\Pdf::showHtmlFromMysql');


//routes API
$routes->group('api', static function ($routes) {
    $routes->post('login', 'Api\Auth::login');
    $routes->get('categories', 'Api\Category::index');
    $routes->post('programs', 'Api\Program::index');
    $routes->get('program/(:any)', 'Api\Program::detail/$1');
    $routes->post('pdf', 'Api\Pdf::upload');
    $routes->post('generate-pdf', 'Api\Pdf::generatePdf');
    $routes->post('daftar-program', 'Api\Program::daftarProgram');
    $routes->get('kegiatanku', 'Api\Kegiatan::kgetiatanku');
    $routes->get('kegiatan/(:any)', 'Api\Kegiatan::detail/$1');
    $routes->post('submit-dokumen', 'Api\Document::submit');
    $routes->patch('program', 'Api\Program::updateProgram');
    $routes->post('program', 'Api\Program::addProgram');
    $routes->delete('program/(:any)', 'Api\Program::deleteProgram/$1');
    $routes->delete('document/(:any)', 'Api\Document::deleteDocument/$1');
    $routes->delete('template/(:any)', 'Api\Document::deleteTemplateDocument/$1');
    $routes->post('template', 'Api\Pdf::upload');
    $routes->get('program-document/(:any)', 'Api\Program::getDocuments/$1');
});

$routes->group('pengelola', static function ($routes) {
    $routes->get('dashboard', 'Pengelola\Dashboard::index', ['filter' => 'authGuard']);
    $routes->get('program', 'Pengelola\Program::index', ['filter' => 'authGuard']);
    $routes->get('create/program', 'Pengelola\Program::create', ['filter' => 'authGuard']);
    $routes->get('program/(:any)', 'Pengelola\Program::edit/$1', ['filter' => 'authGuard']);
});

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

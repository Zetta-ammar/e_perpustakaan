<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==============================
// PUBLIC
// ==============================

$routes->get('/', 'Home::index');
$routes->get('detail/(:num)', 'Home::detail/$1');

// ==============================
// AUTH
// ==============================

$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// ==============================
// ADMIN
// ==============================

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // ==========================
    // KATEGORI
    // ==========================

    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->get('kategori/create', 'Admin\Kategori::create');
    $routes->post('kategori/store', 'Admin\Kategori::store');
    $routes->get('kategori/edit/(:num)', 'Admin\Kategori::edit/$1');
    $routes->post('kategori/update/(:num)', 'Admin\Kategori::update/$1');
    $routes->get('kategori/delete/(:num)', 'Admin\Kategori::delete/$1');

    // ==========================
    // BUKU
    // ==========================

    $routes->get('buku', 'Admin\Buku::index');
    $routes->get('buku/create', 'Admin\Buku::create');
    $routes->post('buku/store', 'Admin\Buku::store');
    $routes->get('buku/edit/(:num)', 'Admin\Buku::edit/$1');
    $routes->post('buku/update/(:num)', 'Admin\Buku::update/$1');
    
    $routes->get('buku/delete/(:num)', 'Admin\Buku::delete/$1');

    

});
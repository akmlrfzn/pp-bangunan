<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->get('dashboard', 'DashboardController::index');

// $routes->get('products', 'ProductController::index');

// Category Routes 
$routes->get('/categories', 'CategoryController::index');
$routes->get('/categories/create', 'CategoryController::create');
$routes->post('/categories/store', 'CategoryController::store');
$routes->get('/categories/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('/categories/update/(:num)', 'CategoryController::update/$1');
$routes->get('/categories/delete/(:num)', 'CategoryController::delete/$1');



$routes->group('products', function($routes) {
    $routes->get('/', 'ProductController::index'); // daftar produk
    $routes->get('create', 'ProductController::create'); // form tambah produk
    $routes->post('store', 'ProductController::store'); // proses simpan
    $routes->get('edit/(:num)', 'ProductController::edit/$1'); // form edit produk
    $routes->post('update/(:num)', 'ProductController::update/$1'); // proses update
    $routes->post('delete/(:num)', 'ProductController::delete/$1'); // proses hapus
});


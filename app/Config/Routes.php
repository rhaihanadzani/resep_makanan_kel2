<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Baca resep

$routes->get('/', 'Home::index');

$routes->group('resep', function ($routes) {
    $routes->get('create', 'ResepController::create');
    $routes->post('store', 'ResepController::store');

    // ✅ perbaikan path edit dan update
    $routes->get('edit/(:num)', 'ResepController::edit/$1');
    $routes->post('update/(:num)', 'ResepController::update/$1');

    $routes->delete('delete/(:num)', 'ResepController::delete/$1');


    $routes->get('detail/(:segment)', 'ResepController::detail/$1');
});

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::login');

$routes->post('/caisse', 'CaisseController::index');
$routes->get('/achat', 'Achat::index');
$routes->post('/achat/create', 'Achat::create');
$routes->get('/', 'CaisseController::index');

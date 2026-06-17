<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::login');

$routes->post('/caisse', 'CaisseController::index');

$routes->post('/achat', 'Achat::index');
$routes->post('/achat/create', 'Achat::create');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/achat', 'Achat::index');
$routes->post('/achat/create', 'Achat::create');

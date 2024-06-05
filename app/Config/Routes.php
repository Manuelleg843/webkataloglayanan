<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->post('login', 'Authentication::Index');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('logout', 'Authentication::logout');
$routes->get('manajemen_layanan', 'Layanan::manajemen_layanan');
// $routes->get('detail_layanan', 'Layanan::detail_layanan');
$routes->get('detail_layanan/(:num)', 'Layanan::detail_layanan/$1');

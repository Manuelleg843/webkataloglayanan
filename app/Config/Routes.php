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
$routes->get('manajemen_persetujuan', 'Layanan::manajemen_persetujuan');
$routes->get('create_layanan', 'Layanan::create_layanan');
$routes->post('create_layanan/save', 'Layanan::save');
$routes->get('edit_layanan/(:num)', 'Layanan::edit_layanan/$1');
$routes->post('edit_layanan/update/(:num)', 'Layanan::update/$1');
// $routes->get('detail_layanan', 'Layanan::detail_layanan');
$routes->get('detail_layanan/(:num)', 'Layanan::detail_layanan/$1');
// $routes->get('delete_layanan/(:num)', 'Layanan::delete/$1');
$routes->delete('delete_layanan/(:num)', 'Layanan::delete/$1');
$routes->post('approve_layanan/(:num)', 'Layanan::approve/$1');
$routes->get('review_layanan/(:num)', 'Layanan::review/$1');

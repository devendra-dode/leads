<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Web::index');
$routes->get('/login', 'Login::index');
$routes->post('/', 'Login::index');

$routes->get('/dashboard', 'Dashboard::index', ['filter'=>'auth']);
$routes->get('/logout', 'User::logout', ['filter'=>'auth']);

$routes->get('/users', 'User::index', ['filter'=>'auth']);
$routes->get('/fetchUsers', 'User::fetchUsers');

$routes->get('/service', 'Service::index', ['filter'=>'auth']);
$routes->get('/fetchServices', 'Service::fetchServices');
$routes->get('service/create', 'Service::create');
$routes->post('service/store', 'Service::store');
$routes->get('service/edit/(:num)', 'Service::edit/$1');
$routes->post('service/update/(:num)', 'Service::update/$1');


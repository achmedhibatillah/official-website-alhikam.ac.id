<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Guest::index');

$routes->get('/masuk', 'Auth::masuk');
$routes->get('/daftar', 'Auth::daftar');
$routes->post('/authentication', 'Auth::masuk_auth');
$routes->post('/registration', 'Auth::daftar_auth');
$routes->get('/d', 'Auth::destroy');

$routes->get('/berkas-pendaftaran', 'User::index', ['filter' => 'user-auth']);
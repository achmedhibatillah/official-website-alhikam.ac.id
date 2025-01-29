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
$routes->get('/biodata-calon-santri', 'User::biodata_calon_santri', ['filter' => 'user-auth']);
$routes->get('/biodata-orang-tua', 'User::biodata_orang_tua', ['filter' => 'user-auth']);
$routes->get('/riwayat-kesehatan-dan-lain-lain', 'User::riwayat_kesehatan_dan_lain_lain', ['filter' => 'user-auth']);

$routes->post('/simpan-santri', 'Santri::update', ['filter' => 'user-auth']);
$routes->post('/simpan-ortu', 'Ortu::update', ['filter' => 'user-auth']);
$routes->post('/simpan-riwayat-kesehatan-dan-lain-lain', 'RiwayatKesehatan::update', ['filter' => 'user-auth']);
$routes->post('/simpan-penyakit-pernah-dialami', 'RiwayatKesehatan::update_penyakit_pernah', ['filter' => 'user-auth']);
$routes->post('/simpan-penyakit-sedang-dialami', 'RiwayatKesehatan::update_penyakit_sedang', ['filter' => 'user-auth']);
$routes->get('/hapus-penyakit-pernah-dialami/(:num)', 'RiwayatKesehatan::hapus_penyakit_pernah/$1', ['filter' => 'user-auth']);

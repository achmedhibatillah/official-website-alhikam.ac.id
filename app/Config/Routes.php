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
$routes->get('/bukti-pembayaran', 'User::bukti_pembayaran', ['filter' => 'user-auth']);
$routes->get('/tes-tulis', 'User::tes_tulis', ['filter' => 'user-auth']);
$routes->get('/tes-wawancara', 'User::tes_wawancara', ['filter' => 'user-auth']);

$routes->post('/simpan-santri', 'Santri::update', ['filter' => 'user-auth']);
$routes->post('/simpan-ortu', 'Ortu::update', ['filter' => 'user-auth']);
$routes->post('/simpan-riwayat-kesehatan-dan-lain-lain', 'RiwayatKesehatan::update', ['filter' => 'user-auth']);
$routes->post('/simpan-bukti-pembayaran', 'BuktiPembayaran::update', ['filter' => 'user-auth']);

$routes->post('/simpan-penyakit-pernah-dialami', 'RiwayatKesehatan::update_penyakit_pernah', ['filter' => 'user-auth']);
$routes->post('/simpan-penyakit-sedang-dialami', 'RiwayatKesehatan::update_penyakit_sedang', ['filter' => 'user-auth']);
$routes->post('/simpan-prestasi', 'RiwayatKesehatan::update_prestasi', ['filter' => 'user-auth']);
$routes->post('/simpan-organisasi', 'RiwayatKesehatan::update_organisasi', ['filter' => 'user-auth']);
$routes->post('/simpan-bahasa', 'RiwayatKesehatan::update_bahasa', ['filter' => 'user-auth']);
$routes->post('/simpan-keahlian', 'RiwayatKesehatan::update_keahlian', ['filter' => 'user-auth']);
$routes->post('/simpan-olahraga', 'RiwayatKesehatan::update_olahraga', ['filter' => 'user-auth']);
$routes->post('/simpan-senbud', 'RiwayatKesehatan::update_senbud', ['filter' => 'user-auth']);
$routes->post('/simpan-penalaran', 'RiwayatKesehatan::update_penalaran', ['filter' => 'user-auth']);
$routes->post('/simpan-agama', 'RiwayatKesehatan::update_agama', ['filter' => 'user-auth']);
$routes->post('/simpan-bahasam', 'RiwayatKesehatan::update_bahasam', ['filter' => 'user-auth']);

$routes->get('/hapus-penyakit-pernah-dialami/(:num)', 'RiwayatKesehatan::hapus_penyakit_pernah/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-penyakit-sedang-dialami/(:num)', 'RiwayatKesehatan::hapus_penyakit_sedang/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-prestasi/(:num)', 'RiwayatKesehatan::hapus_prestasi/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-organisasi/(:num)', 'RiwayatKesehatan::hapus_organisasi/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-bahasa/(:num)', 'RiwayatKesehatan::hapus_bahasa/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-keahlian/(:num)', 'RiwayatKesehatan::hapus_keahlian/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-olahraga/(:num)', 'RiwayatKesehatan::hapus_olahraga/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-senbud/(:num)', 'RiwayatKesehatan::hapus_senbud/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-penalaran/(:num)', 'RiwayatKesehatan::hapus_penalaran/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-agama/(:num)', 'RiwayatKesehatan::hapus_agama/$1', ['filter' => 'user-auth']);
$routes->get('/hapus-bahasam/(:num)', 'RiwayatKesehatan::hapus_bahasam/$1', ['filter' => 'user-auth']);
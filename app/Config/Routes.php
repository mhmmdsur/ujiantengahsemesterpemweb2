<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('surah', 'Home::daftarSurah');
$routes->get('surah/(:num)', 'Home::detail/$1');
<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
// LOGIN
$route['login/sign_in'] = 'login/sign_in';
$route['login'] = 'login';
// DASHBOARD
$route['dashboard/(:any)'] = 'dashboard';
$route['dashboard'] = 'dashboard';
// EIGENT VEKTOR
$route['eigen-vektor/create'] = 'eigenvektor/create';
$route['eigen-vektor/update/(:any)'] = 'eigenvektor/update/$1';
$route['eigen-vektor/delete/(:any)'] = 'eigenvektor/delete/$1';
$route['eigen-vektor'] = 'eigenvektor';
// KRITERIA
$route['bobot-kriteria'] = 'kriteria/bobot';
$route['kriteria/delete/(:any)'] = 'kriteria/delete/$1';
$route['kriteria/create/(:any)'] = 'kriteria/create/$1';
$route['kriteria'] = 'kriteria';
// PERHITUNGAN DISTRIBUTOR
$route['data-perhitungan/save'] = 'perhitungan/create';
$route['data-perhitungan/update/(:any)'] = 'perhitungan/update/$1';
$route['data-perhitungan/delete/(:any)'] = 'perhitungan/delete/$1';
$route['rekomendasi-jalur'] = 'perhitungan/rekomendasi';
$route['data-perhitungan'] = 'perhitungan';
// DISTRIBUTOR
$route['data-distributor/delete/(:any)'] = 'distributor/delete/$1';
$route['data-distributor/update/(:any)'] = 'distributor/update/$1';
$route['data-distributor/create'] = 'distributor/create';
$route['data-distributor'] = 'distributor';
// DEFAULT
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

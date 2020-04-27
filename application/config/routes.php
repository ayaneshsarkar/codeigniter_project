<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update/(:any)'] = 'posts/update/$1';
$route['posts/edit/(:any)'] = 'posts/edit/$1';
$route['posts/(:any)'] = 'posts/show/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/delete/(:any)'] = 'categories/delete/$1';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/logout'] = 'users/logout';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;





<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['('.GE.'|'.EN.')/(:any)'] = 'site/$2';

$route['('.GE.'|'.EN.')/post/(:num)/(:any)'] = 'site/post/$2';
$route['('.GE.'|'.EN.')/branch/(:num)/(:any)'] = 'site/branch/$2';

$route['('.GE.'|'.EN.')'] = 'site';

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

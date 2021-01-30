<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'start';
$route['welcome'] = 'start';
$route['dashboard'] = 'start';
$route['dashboard/conflict'] = 'start/index/conflict';
$route['dashboard/menonjol'] = 'start/index/menonjol';
$route['dashboard/isu'] = 'start/issue';
$route['signin'] = 'account/login';
$route['dosignin'] = 'account/dologin';
$route['signout'] = 'account/logout';
$route['customs/(:any)'] = 'customs/index/$1';
$route['figureprofile/(:any)'] = 'figureprofile/start/$1';
$route['figureprofile/edit/(:any)'] = 'figureprofile/start/edit/$1';
$route['figureprofile/detail/(:any)'] = 'figureprofile/start/detail/$1';
$route['issue/(:any)'] = 'issue/start/$1';
$route['issue/edit/(:any)'] = 'issue/start/edit/$1';
$route['issue/detail/(:any)'] = 'issue/start/detail/$1';
$route['issue/print/(:any)'] = 'issue/start/print/$1';
$route['cases/(:any)'] = 'cases/start/$1';
$route['cases/edit/(:any)'] = 'cases/start/edit/$1';
$route['cases/detail/(:any)'] = 'cases/start/detail/$1';
$route['forgotpassword'] = 'account/forgotpassword';
$route['changepassword'] = 'account/changepassword';
$route['userprofile'] = 'account/userprofile';
$route['accessdenied'] = 'myerror/accessdenied';

$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;

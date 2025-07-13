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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//API routes
// $route['api/login'] = 'api/login';
// $route['api/logout'] = 'api/logout';
// $route['api/register'] = 'api/register';

$route['dashboard'] = 'dashboard/index';

//Tasks CRUD
$route['tasks'] = 'tasks/index';
$route['tasks/create'] = 'tasks/create';
$route['tasks/edit/(:num)'] = 'tasks/edit/$1';
$route['tasks/delete/(:num)'] = 'tasks/delete/$1';

//API routes
$route['api/tasks/(:num)'] = 'api/tasks/$1';
$route['api/stats'] = 'api/stats';

// $route['api/projects'] = 'api/projects';
// $route['api/projects/(:num)'] = 'api/projects/$1';
// $route['api/users'] = 'api/users';
// $route['api/users/(:num)'] = 'api/users/$1';
// $route['api/teams'] = 'api/teams';
// $route['api/teams/(:num)'] = 'api/teams/$1';
// $route['api/teams/(:num)/members'] = 'api/teams/members/$1';
// $route['api/teams/(:num)/tasks'] = 'api/teams/tasks/$1';
// $route['api/teams/(:num)/projects'] = 'api/teams/projects/$1';
// $route['api/teams/(:num)/members/(:num)'] = 'api/teams/member/$1/$2';
// $route['api/teams/(:num)/tasks/(:num)'] = 'api/teams/task/$1/$2';
// $route['api/teams/(:num)/projects/(:num)'] = 'api/teams/project/$1/$2';
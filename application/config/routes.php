<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/*
| -------------------------------------------------------------------------
| API Login, Task, Actiities, Screenshot
| -------------------------------------------------------------------------
*/

// Login to GET Authorization [POST]
$route['client/login'] = 'api/client/login';
$route['client/logout'] = 'api/client/logout';
$route['client/register'] = 'api/client/register';

// Task to GET or POST with Authorization
$route['task'] = 'api/task';
$route['tasks'] = 'api/tasks';

// Activities to GET or POST with Authorization
$route['activities'] = 'api/activities';

// Screenshot to GET or POST with Authorization
$route['screenshot'] = 'api/screenshot';


/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8

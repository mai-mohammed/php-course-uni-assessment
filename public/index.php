<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once '../vendor/autoload.php';

use Core\Router;

$router = new Router();

// Define routes
$router->add('/', 'HomeController@index');
$router->add('/register', 'AuthController@showRegisterForm'); // GET
$router->add('/register/submit', 'AuthController@processRegistration'); // POST
$router->add('/login', 'AuthController@showLoginForm'); // GET
$router->add('/login/submit', 'AuthController@processLogin'); // POST
$router->add('/logout', 'AuthController@logout');

// customer routes
$router->add('/products', 'ProductController@index');
$router->add('/products/{id}', 'ProductController@show');

// admin panel routes
$router->add('/admin-panel', 'AdminController@index');
$router->add('/admin-panel/products', 'AdminController@listProducts');
$router->add('/admin-panel/products/{id}', 'AdminController@productDetails');

$router->add('/about', 'StaticController@about');


// Dispatch the requested URL
$router->dispatch($_SERVER['REQUEST_URI']);

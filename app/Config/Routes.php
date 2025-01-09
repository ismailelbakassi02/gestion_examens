<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 
 $routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/authenticate', 'AuthController::authenticate');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/store', 'AuthController::store');
$routes->get('/dashboard', 'AuthController::dashboard');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/profileE', 'AuthController::profileE');
$routes->post('/profileE/update', 'AuthController::E_update');

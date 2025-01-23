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
$routes->get('/notes', 'NoteController::index');
$routes->get('/notes/student/(:num)', 'NoteController::showByStudent/$1');
$routes->get('/reclamation/student/(:num)/(:num)','ReclamationController::reclamer/$1/$2');
$routes->post('reclamation/student/reclamer', 'ReclamationController::store');
$routes->get('reclamation', 'ReclamationController::index');





<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\APIController;
use Controller\CitaController;
use Controller\AdminController;
use Controller\LoginController;
use Controller\ServicioController;

$router = new Router();

// Log in
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Password recovery
$router->get('/forgot-password', [LoginController::class, 'forgotPassword']);
$router->post('/forgot-password', [LoginController::class, 'forgotPassword']);
$router->get('/recover-password', [LoginController::class, 'recoverPassword']);
$router->post('/recover-password', [LoginController::class, 'recoverPassword']);

// Sign up
$router->get('/sign-up', [LoginController::class, 'signUp']);
$router->post('/sign-up', [LoginController::class, 'signUp']);

// Confirm account
$router->get('/confirm-account',  [LoginController::class, 'confirmAccount']);
$router->get('/message',  [LoginController::class, 'message']);

// Private section (only for registered users)
$router->get('/appointment',  [CitaController::class, 'index']);
$router->get('/admin',  [AdminController::class, 'index']);

// Appointments API
$router->get('/api/services', [APIController::class, 'index']);
$router->post('/api/appointments', [APIController::class, 'save']);
$router->post('/api/delete', [APIController::class, 'delete']);

// CRUD for Services
$router->get('/services', [ServicioController::class, 'index']);
$router->get('/services/create', [ServicioController::class, 'create']);
$router->get('/services/update', [ServicioController::class, 'update']);
$router->post('/services/create', [ServicioController::class, 'create']);
$router->post('/services/update', [ServicioController::class, 'update']);
$router->post('/services/delete', [ServicioController::class, 'delete']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

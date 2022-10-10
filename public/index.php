<?php 

require_once __DIR__ . '/../includes/app.php';

use Controller\LoginController;
use MVC\Router;
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

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
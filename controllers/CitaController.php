<?php

namespace Controller;

use MVC\Router;

class CitaController
{
    public static function index(Router $router)
    {
        session_start();
        
        $router->render('appointment/index', [
            'nombre' => $_SESSION['nombre']
        ]);
    }
}

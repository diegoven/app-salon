<?php

namespace Controller;

use MVC\Router;

class CitaController
{
    public static function index(Router $router)
    {
        session_start();

        isAuth();

        $router->render('appointment/index', [
            'id' => $_SESSION['id'],
            'nombre' => $_SESSION['nombre']
        ]);
    }
}

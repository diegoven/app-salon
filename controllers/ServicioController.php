<?php

namespace Controller;

use Model\Servicio;
use MVC\Router;

class ServicioController
{
    public static function index(Router $router)
    {
        session_start();

        $servicios = Servicio::all();

        $router->render('/services/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }

    public static function create(Router $router)
    {
        session_start();

        $servicio = new Servicio();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if (empty($alertas)) {
                $servicio->guardar();
                header('Location: /services');
            }
        }

        $router->render('/services/create', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function update(Router $router)
    {
        session_start();

        $id = $_GET['id'];
        if (!is_numeric($id)) return;

        $servicio = Servicio::find($id);
        $alertas = [];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if (empty($alertas)) {
                $servicio->guardar();
                
                header('Location: /services');
            }
        }

        $router->render('/services/update', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    public static function delete(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }
}

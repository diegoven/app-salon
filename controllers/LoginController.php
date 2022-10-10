<?php

namespace Controller;

use Class\Email;
use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $router->render('auth/login', []);
    }

    public static function logout()
    {
        echo "from logout";
    }

    public static function forgotPassword(Router $router)
    {
        $router->render('auth/forgot-password', []);
    }

    public static function recoverPassword()
    {
        echo "from recover-password";
    }

    public static function signUp(Router $router)
    {
        $usuario = new Usuario;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Cuando se hace click al botón de 'crear cuenta' se guardan en memoria los datos que existan en los campos del formulario para seguir mostrándolos en la vista
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) $alertas = Usuario::getAlertas();
                else {
                    // Hash password
                    $usuario->hashPassword();

                    // Generar token único
                    $usuario->crearToken();

                    // Enviar el correo
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();
                }
            }
        }

        $router->render('auth/sign-up', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}

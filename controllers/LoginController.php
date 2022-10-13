<?php

namespace Controller;

use Class\Email;
use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) {
                    if ($usuario->comprobarPasswordAndVerificado($auth->password)) {
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // Redireccionamiento
                        if ($usuario->admin === '1') {
                            $_SESSION['admin'] == $usuario->admin ?? null;

                            header('Location: /admin');
                        } else {
                            header('Location: /appointment');
                        }
                    }
                } else Usuario::setAlerta('error', 'Usuario no encontrado');
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        echo "from logout";
    }

    public static function forgotPassword(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario && $usuario->confirmado === '1') {
                    // Generar un token
                    $usuario->crearToken();
                    $usuario->guardar();

                    // Enviar el correo
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    Usuario::setAlerta('exito', 'Revisa tu bandeja para cambiar la contraseña');
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no está confirmado.');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/forgot-password', [
            'alertas' => $alertas
        ]);
    }

    public static function recoverPassword(Router $router)
    {
        $alertas = [];

        $error = false;

        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if (empty($usuario) || !$usuario->token) {
            Usuario::setAlerta('error', 'Token no válido');
            $error = true;
        }

        // Leer y guardar la nueva contraseña
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if (empty($alertas)) {
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();

                if ($resultado) header('Location: /');
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/recover-password', [
            'alertas' => $alertas,
            'error' => $error
        ]);
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

                    // Crear el usuario
                    $resultado = $usuario->guardar();
                    if ($resultado) header('Location: /message');
                }
            }
        }

        $router->render('auth/sign-up', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function message(Router $router)
    {
        $router->render('auth/message');
    }

    public static function confirmAccount(Router $router)
    {
        $alertas = [];

        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if (empty($usuario)) Usuario::setAlerta('error', 'Token no válido');
        else {
            $usuario->confirmado = 1;
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirm-account', [
            'alertas' => $alertas
        ]);
    }
}

<?php

namespace Controller;

use MVC\Router;

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

    public static function forgotPassword()
    {
        echo "from forgot-password";
    }

    public static function recoverPassword()
    {
        echo "from recover-password";
    }

    public static function signUp(Router $router)
    {
        $router->render('auth/sign-up', [
            
        ]);
    }
}

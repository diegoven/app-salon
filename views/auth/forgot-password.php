<h1 class="nombre-pagina">¿Olvidó su contraseña?</h1>
<p class="descripcion-pagina">Reestablezca su contraseña escribiendo su email a continuación:</p>

<?php
include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/forgot-password" class="formulario" method="POST">
    <div class="campo">
        <label for="email">E-mail:</label>
        <input type="email" id="email" placeholder="correo@correo.com" name="email">
    </div>

    <input type="submit" value="Enviar instrucciones" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
    <a href="/sign-up">¿Aún no tienes una cuenta? ¡Crea una!</a>
</div>
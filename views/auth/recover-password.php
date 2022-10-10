<h1 class="nombre-pagina">Reestablece tu contraseña</h1>
<p class="descripcion-pagina">Escribe tu nueva contraseña a continuación:</p>

<?php
include_once __DIR__ . '/../templates/alertas.php';
?>

<?php if ($error) return null; ?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" placeholder="Tu nueva contraseña" name="password">
    </div>

    <input type="submit" value="Guardar contraseña nueva" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
    <a href="/sign-up">¿Aún no tienes una cuenta? ¡Crea una!</a>
</div>
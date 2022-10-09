<h1 class="nombre-pagina">Crear cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<form action="/sign-up" class="formulario" method="POST">
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" placeholder="Tu nombre" name="nombre">
    </div>

    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" placeholder="Tu apellido" name="apellido">
    </div>

    <div class="campo">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" placeholder="66666666" name="telefono">
    </div>

    <div class="campo">
        <label for="email">E-mail:</label>
        <input type="email" id="email" placeholder="correo@correo.com" name="email">
    </div>

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
    </div>

    <input type="submit" value="Crear cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
    <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
</div>
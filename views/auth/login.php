<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesión con tus datos</p>

<form action="/" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="correo@correo.com" name="email">
    </div>

    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
    </div>

    <input type="submit" value="Iniciar sesión" class="boton">
</form>

<div class="acciones">
    <a href="/sign-up">¿Aún no tienes una cuenta? ¡Crea una!</a>
    <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
</div>
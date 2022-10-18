<h1 class="nombre-pagina">Agregar Servicio</h1>
<p class="descripcion-pagina">Llena todos los campos para agregar un servicio nuevo</p>
<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/services/create" method="POST" class="formulario">
    <?php include_once __DIR__ . "/form.php"; ?>

    <input type="submit" value="Crear servicio" class="boton">
</form>
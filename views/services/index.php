<h1 class="nombre-pagina">Servicios</h1>
<?php include_once __DIR__ . "/../templates/barra.php"; ?>
<p class="descripcion-pagina">Administración de servicios</p>

<ul class="servicios">
    <?php foreach ($servicios as $servicio) : ?>
        <li>
            <p>Nombre: <span><?php echo $servicio->nombre; ?> </span></p>
            <p>Precio: <span>$<?php echo $servicio->precio; ?> </span></p>

            <div class="acciones">
                <a class="boton" href="/services/update?id=<?php echo $servicio->id; ?>">Actualizar</a>

                <form action="/services/delete" method="POST">
                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
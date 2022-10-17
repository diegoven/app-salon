<div class="barra">
    <p>Hola, <?php echo $nombre; ?></p>
    <a href="/logout" class="boton">Cerrar sesión</a>
</div>

<?php if (isset($_SESSION['admin'])) : ?>
    <div class="barra-servicios">
        <a href="/admin" class="boton">Ver citas</a>
        <a href="/services" class="boton">Ver servicios</a>
        <a href="/services/create" class="boton">Crear servicio</a>
    </div>
<?php endif; ?>
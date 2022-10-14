<?php include_once __DIR__ . "/../templates/barra.php"; ?>
<h1 class="nombre-pagina">Panel de Administración</h1>
<h2>Buscar Citas</h2>

<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha">
        </div>
    </form>
</div>

<div class="citas-admin">
    <ul class="citas">
        <?php
        foreach ($citas as $cita) :
            if ($idCita !== $cita->id) :
                $idCita = $cita->id;
        ?>
                <li>
                    <p>ID: <span><?php echo $cita->id; ?></span></p>
                    <p>Hora: <span><?php echo $cita->hora; ?></span></p>
                    <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
                    <p>E-mail: <span><?php echo $cita->email; ?></span></p>
                    <p>Teléfono: <span><?php echo $cita->telefono; ?></span></p>

                    <h3>Servicios</h3>
                </li>
            <?php endif; ?>
            <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>
        <?php endforeach; ?>
    </ul>
</div>
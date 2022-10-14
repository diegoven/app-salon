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
        $idCita = 0;
        foreach ($citas as $key => $cita) :
            if ($idCita !== $cita->id) :
                $idCita = $cita->id;
                $total = 0;
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
            <?php
            $total += $cita->precio;

            $actual = $cita->id;
            $proximo = $citas[$key + 1]->id ?? 0;

            if (esUltimo($actual, $proximo)) :
            ?>
                <p class="total">Total: <span>$<?php echo $total; ?></span></p>
        <?php
            endif;
        endforeach;
        ?>
    </ul>
</div>
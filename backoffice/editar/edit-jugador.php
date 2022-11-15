<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/backoffice.css">
    <link rel="stylesheet" href="../../css/ingresarBack.css">
    <link rel="icon" href="../../images/logos/icon.png">
    <script src='../../js/paises.js'></script>
    <title>Editar un jugador</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Editar un jugador</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Jugador editado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al editar el jugador.';
            mensajeError($mensaje);
        }
    }

    ?>
        <div class="form" style="height: 600px;">
            <form method="POST" action="../../controlador/editar-jugador.php">
                <select name="jugador" id="selDeporte" class="select" required>
                    <option value="">Seleccione un jugador</option>
                    <?php
                    $sql = mysqli_query($conexion, "SELECT * from jugador");

                    while ($data = mysqli_fetch_array($sql)) {

                        echo '<option value="' . $data['IdJugador'] . '">' . $data['nomJug'] . " " . $data['apeJug'] . '</option>';
                    }
                    ?>
                </select><br>
                <label for="nombre">Nombre del jugador</label><br>
                <input type="text" placeholder="Nombre del jugador" name="nombre" class="nJugador x"><br>
                <label for="apellido">Apellido del jugador</label><br>
                <input type="text" placeholder="Apellido del jugador" name="apellido" class="aJugador x"><br>
                <label for="edad">Edad</label><br>
                <input type="number" placeholder="Edad del jugador" name="edad" class="eJugador x" min='10' max='70'><br>
                <label for="pais">País de nacimiento del jugador</label><br>
                <select name="pais" class="select">
                    <option value=''>Seleccione un país</option>
                    <script>
                        for (var x = 0; x < paises.length; x++)
                            document.write("<option value=" + paises[x] + ">" + paises[x] + "</option>");
                    </script>
                </select> <br>

                <input type="submit" value="Editar jugador" class="enviar" name="enviar">
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../../js/backoffice.js"></script>
</body>

</html>
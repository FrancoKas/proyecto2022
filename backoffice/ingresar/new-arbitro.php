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

    <title>Agregar un nuevo arbitro</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Ingresar un nuevo arbitro</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Arbitro ingresado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al ingresar el arbitro.';
            mensajeError($mensaje);
        }
    }

    ?>

    <div style="margin-top: 40px;">
        <form method="POST" action="../../controlador/ingresar-arbitro.php">
            <label for="nombre">Nombre del arbitro</label><br>
            <input type="text" placeholder="Nombre del arbitro" name="nombre" class="nArbitro x" required><br>
            <label for="apellido">Apellido del arbitro</label><br>
            <input type="text" placeholder="Apellido del arbitro" name="apellido" class="aArbitro x" required><br>
            <label for="deporte">Deporte al que se dedica</label><br>
            <select name="deporte" class="select" required>
                <option value=''>Seleccione un deporte</option>
                <?php
                $sql = mysqli_query($conexion, "SELECT * from deporte");

                while ($data = mysqli_fetch_array($sql)) {

                    echo '<option value="' . $data['IdDeporte'] . '">' . $data['nomDeporte'] . '</option>';
                }
                ?>
            </select> <br>

            <input type="submit" value="Ingresar arbitro" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
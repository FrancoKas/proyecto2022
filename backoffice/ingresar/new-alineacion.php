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

    <title>Agregar una nueva alineación</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Ingresar una alineación</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Alineacion ingresada correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al ingresar la alineacion.';
            mensajeError($mensaje);
        }
    }

    ?>

    <div style="margin-top: 40px;">
        <form method="POST" action="../../controlador/ingresar-alineacion.php">
            <label for="nombre">Nombre de la alineacion</label><br>
            <input type="text" placeholder="Ej: 4-4-2 (Fútbol)" name="nombre" class="nArbitro x" required><br>
            <label for="deporte">Deporte de la alineacion</label><br>
            <select name="deporte" class="select" required>
                <option value=''>Seleccione un deporte</option>
                <?php
                $sql = mysqli_query($conexion, "SELECT * from deporte");

                while ($data = mysqli_fetch_array($sql)) {

                    echo '<option value="' . $data['IdDeporte'] . '">' . $data['nomDeporte'] . '</option>';
                }
                ?>
            </select> <br>

            <input type="submit" value="Ingresar alineación" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
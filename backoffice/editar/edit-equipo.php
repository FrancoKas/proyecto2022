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
    <title>Editar equipos</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Editar un equipo</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Equipo editado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al editar el equipo.';
            mensajeError($mensaje);
        }
    }

    ?>
        <div style="margin-top: 20px;">
            <form method="POST" action="../../controlador/editar-equipo.php">
                <label for="equipo">Equipos</label><br>
                <select name="equipo" class="select" required>
                    <option value="">Seleccione un equipo</option>
                    <?php
                    $sql = mysqli_query($conexion, "SELECT * from equipo");

                    while ($data = mysqli_fetch_array($sql)) {

                        echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
                    }
                    ?>
                </select><br>
                <label for="nombre">Nombre del equipo</label><br>
                <input type="text" placeholder="Nombre del equipo" name="nombre" class="nEquipo x"><br>
                <select name="pais" class="select">
                    <option value=''>Seleccione un país</option>
                    <script>
                        for (var x = 0; x < paises.length; x++)
                            document.write("<option value=" + paises[x] + ">" + paises[x] + "</option>");
                    </script>
                </select> <br>
                <input type="submit" value="Editar equipo" class="enviar" name="enviar">
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../../js/backoffice.js"></script>
</body>

</html>
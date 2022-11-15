<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/backoffice.css">
    <link rel="stylesheet" href="../../css/ingresarBack.css">
    <link rel="icon" href="../../images/logos/icon.png">
    <title>Agregar nuevo partido</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->

    <!-- NAVBAR -->
    <div class="title">
        <h1>Editar un partido</h1>
    </div>

    <?php

    if(!isset($_REQUEST['id'])){
        header('location: ../error.php');
    }

    $id = $_REQUEST['id'];


    ?>


    <div class="form" style="height: auto;">
        <form method="POST" action="../../controlador/editar-partido.php">
        <input type='hidden' value=<?php echo $id?> name='id'>
            <select class='select x' name='eliminarEq'>
            <?php
            $sql = mysqli_query($conexion, "SELECT IdPartido, nomEquipo, compite.IdEquipo FROM compite, equipo WHERE compite.IdPartido = $id and compite.IdEquipo = equipo.IdEquipo");

            while($data = mysqli_fetch_array($sql)){
                echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
            }
            ?>
            </select>
            <input type="submit" name="enviar" value="Eliminar equipo del partido" class="enviar">

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
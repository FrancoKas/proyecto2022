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
        <h1>Ingresar un nuevo partido</h1>
    </div>

    <?php

    $deporte = $_POST['deporte'];
    $arbitro = $_POST['arbitro'];
    $lugar = $_POST['lugar'];
    $fecha = $_POST['fecha'];
    $opcion = $_POST['opcEquipo'];
    $equipos = $_POST['equipos'];


    ?>


    <div class="form" style="height: auto;">
        <form method="POST" action="../../controlador/ingresar-partido.php">
            <input type='hidden' name='deporte' value='<?php echo $deporte ?>'>
            <input type='hidden' name='arbitro' value='<?php echo $arbitro ?>'>
            <input type='hidden' name='lugar' value='<?php echo $lugar ?>'>
            <input type='hidden' name='fecha' value='<?php echo $fecha ?>'>
            <input type='hidden' name='opcion' value='<?php echo $opcion ?>'>
            <input type='hidden' name='equipos' value='<?php echo $equipos ?>'>

            <?php
            if ($opcion == 'seleccion') {
                for ($i = 0; $i < $equipos; $i++) {
                    $sql = mysqli_query($conexion, "SELECT nomEquipo, equipo.IdEquipo FROM equipo, seleccion WHERE seleccion.IdEquipo = equipo.IdEquipo");
                    $var = 'equipo' . $i;
                    echo "<select class='select x' required name=" . "$var" . ">";
                    echo "<option value='' selected>Seleccione una seleccion</option>";
                    while ($data = mysqli_fetch_array($sql)) {
                        echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
                    }
                    echo "</select><br>";
                }
            } else if($opcion == 'club'){
                for ($i = 0; $i < $equipos; $i++) {
                    $sql = mysqli_query($conexion, "SELECT nomEquipo, equipo.IdEquipo FROM equipo, club WHERE club.IdEquipo = equipo.IdEquipo");
                    $var = 'equipo' . $i;
                    echo "<select class='select x' required name=" . "$var" . ">";
                    echo "<option value='' selected>Seleccione un club</option>";
                    while ($data = mysqli_fetch_array($sql)) {
                        echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
                    }
                    echo "</select><br>";
                }
            } else {
                for ($i = 0; $i < $equipos; $i++) {
                    $sql = mysqli_query($conexion, "SELECT nomEquipo, equipo.IdEquipo FROM persona, seleccion WHERE persona.IdEquipo = equipo.IdEquipo");
                    $var = 'equipo' . $i;
                    echo "<select class='select x' required name=" . "$var" . ">";
                    echo "<option value='' selected>Seleccione una persona</option>";
                    while ($data = mysqli_fetch_array($sql)) {
                        echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
                    }
                    echo "</select><br>";
                }
            }
            ?><hr>
            <label>Pertenece a un evento?</label><br>
            <label>Si</label>
            <input type='radio' name='pertenece' value='si' id='si' onclick="ocultar('si')" required>
            <label>No</label>
            <input type='radio' name='pertenece' value='no' id='no' onclick="ocultar('no')" required><br>

            <select name='evento-p' id='evento-p' class='select x' style="display: none">
                <option value=''>Selecciona un evento</option>
                <?php
                    $sql = mysqli_query($conexion, "SELECT * FROM evento WHERE IdDeporte = $deporte");

                    while($data = mysqli_fetch_array($sql)){
                        echo '<option value="' . $data['IdEvento'] . '">' . $data['nomEvento'] . '</option>';
                    }
                ?>
            </select>

            <script>
				function ocultar(n){
                    if(n == 'si'){
                        $('#evento-p').prop("required", true);
                        document.getElementById('evento-p').style.display = 'block';
                    } else {
                        $('#evento-p').prop("required", false);
                        document.getElementById('evento-p').style.display = 'none';
                    }
					
				}

			</script>

            <input type="submit" name="enviar" value="Ingresar partido" class="enviar">

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
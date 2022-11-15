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

    <title>Agregar una nueva incidencia</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require_once '../../modelo/general-model.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Ingresar una incidencia</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Incidencia ingresada correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al ingresar la incidencia.';
            mensajeError($mensaje);
        }
    }

    $id = $_REQUEST['id'];

    ?>

    <div style="margin-top: 40px;">
        <form method="POST" action="../../controlador/ingresar-incidencia.php">
            <input type='hidden' name='id' value=<?php echo $id?>>
            <label>Tipo de incidencia</label><br>
            <label>Cambio</label>
            <input type='radio' name='tipoInc' value='cambio' onclick="mostrarCambio()" required>
            <label>Penalización</label>
            <input type='radio' name='tipoInc' value='penalizacion' onclick="mostrarPenalizacion()" required><br><hr style='margin: 0 auto; width: 270px'>
            <label>Minuto</label><br>
            <input type='number' class='x' id='minutoC' name='minuto' min='1' style='width:80px; height: 40px;' placeholder='Ej: 51' required>

            <div id='cambioDiv' style='display: none'>
            <label>Jugador de reemplazo</label><br>
            <select name='jugReemplazo' id='cambio' class='select'>
                <option value=''>Seleccione un jugador</option>
                <?php
                    $sql = mysqli_query($conexion, "SELECT jugador.IdJugador, jugador.nomJug, jugador.apeJug FROM jugador, partido, equipo, compite, tiene WHERE compite.IdPartido = partido.IdPartido and compite.IdEquipo = equipo.IdEquipo and tiene.IdJugador = jugador.IdJugador and tiene.IdEquipo = compite.IdEquipo and compite.IdPartido = $id");
                    while($data = mysqli_fetch_array($sql)){
                        echo "<option value=$data[IdJugador]>$data[nomJug] $data[apeJug]</option>";
                    }
                
                ?>
            </select><br><hr style='margin: 0 auto; width: 270px'>
            <label>Jugador reemplazado</label><br>
            <select name='jugReemplazado' id='cambio2' class='select'>
                <option value=''>Seleccione un jugador</option>
                <?php
                    $sql = mysqli_query($conexion, "SELECT jugador.IdJugador, jugador.nomJug, jugador.apeJug FROM jugador, partido, equipo, compite, tiene WHERE compite.IdPartido = partido.IdPartido and compite.IdEquipo = equipo.IdEquipo and tiene.IdJugador = jugador.IdJugador and tiene.IdEquipo = compite.IdEquipo and compite.IdPartido = $id");
                    while($data = mysqli_fetch_array($sql)){
                        echo "<option value=$data[IdJugador]>$data[nomJug] $data[apeJug]</option>";
                    }
                
                ?>
            </select><br><hr style='margin: 0 auto; width: 270px'>
            
            </div><br>
            

            <div id='penalizacionDiv' style='display: none'>
            <select name='jugPenalizado' id='jugPenalizado' class='select'>
                <option value=''>Seleccione un jugador</option>
                <?php
                    $sql = mysqli_query($conexion, "SELECT jugador.IdJugador, jugador.nomJug, jugador.apeJug FROM jugador, partido, equipo, compite, tiene WHERE compite.IdPartido = partido.IdPartido and compite.IdEquipo = equipo.IdEquipo and tiene.IdJugador = jugador.IdJugador and tiene.IdEquipo = compite.IdEquipo and compite.IdPartido = $id");
                    while($data = mysqli_fetch_array($sql)){
                        echo "<option value=$data[IdJugador]>$data[nomJug] $data[apeJug]</option>";
                    }
                
                ?>
            </select><br><hr style='margin: 0 auto; width: 270px'>
                    <div id="selectPenalizacion">
            <select name='selPenal' id='penal' class='select' style='width: 220px'>
                <option value=''>Seleccione una penalizacion</option>
                <?php
                    $x = mostrarDatos('partido', 'IdDeporte', "IdPartido = $id", $conexion);
                    $idDep = $x[0];
                    $sql = mysqli_query($conexion, "SELECT nomPenalizacion from incidencia, partido, deporte, penalizacion WHERE incidencia.IdPartido = partido.IdPartido and partido.IdDeporte = deporte.IdDeporte and deporte.IdDeporte = $idDep GROUP BY nomPenalizacion");
                    while($data = mysqli_fetch_array($sql)){
                        echo "<option value='$data[nomPenalizacion]'>$data[nomPenalizacion]</option>";
                    }
                
                ?>
            </select><input id='nPenal' type='button' class='x' style='width: 40px; height: 40px; cursor: pointer' onclick="mostrarInput()" value='+'><br><hr style='margin: 0 auto; width: 270px'>
            </div>
                <div id="newPenal" style='display: none'>
                <br><label>Escriba la penalización</label><br>
                <input type='text' name='newPenal' class='x' id='newPenalIn' style='width: 270px' placeholder='Ej: Tarjeta Amarilla'><br><hr style='margin: 0 auto; width: 270px'>
                </div>
            </div>

            <input type="submit" value="Ingresar penalización" class="enviar" name="enviar">
        </form>
    </div>


    <script>
				function mostrarCambio(){

                    document.getElementById('cambioDiv').style.display = 'block';
                    document.getElementById('penalizacionDiv').style.display = 'none';
                    $('#cambio').prop("required", true);
                    $('#cambio2').prop("required", true);
                    $('#penal').prop("required", false);
                    $('#jugPenalizado').prop("required", false);
                    $('#newPenalIn').prop("required", false);

				}

                function mostrarPenalizacion(){

                    document.getElementById('cambioDiv').style.display = 'none';
                    document.getElementById('penalizacionDiv').style.display = 'block';
                    $('#cambio').prop("required", false);
                    $('#cambio2').prop("required", false);
                    $('#penal').prop("required", true);
                    $('#jugPenalizado').prop("required", true);

                }

                function mostrarInput(){
                    document.getElementById('selectPenalizacion').style.display = 'none';
                    document.getElementById('newPenal').style.display = 'block';
                    $('#penal').prop("required", false);
                    $('#newPenalIn').prop("required", true);
                }

			</script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
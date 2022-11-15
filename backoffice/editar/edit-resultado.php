<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/backoffice.css">
    <link rel="stylesheet" href="../../css/ingresarBack.css">
    <link rel="icon" href="../../images/logos/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Editar partidos</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    $id = $_REQUEST['id'];
    ?>

    <div class="title">
        <h1>Resultado</h1>
    </div>

    <div class="form">
        <form method="POST" action="../../controlador/editar-partido.php?opc=res">

            <input type='hidden' value='<?php echo $id ?>' name='id'>
            <?php
            $equipos = mysqli_query($conexion, "SELECT * FROM compite, equipo, deporte, partido WHERE compite.IdPartido = $id and compite.IdEquipo = equipo.IdEquipo and partido.IdDeporte = deporte.IdDeporte and compite.IdPartido = partido.IdPartido GROUP BY equipo.IdEquipo;");
            $i = 0;
            while ($data = mysqli_fetch_array($equipos)) {
                $i++;
                echo "<input type='text' value='$data[nomEquipo]' style='width: 200px;' readonly class='x'>";
                echo "<input type='hidden' name='equipo$i' value='$data[IdEquipo]'>";
                if ($data['tipoPuntuacion'] == 'Puntos') {
                    echo "<input type='number' id='punteq$i' value='hola' placeholder='Puntuación' onchange='requerir($i)' class='x' name='puntEquipo$i' style='width: 100px;' min='0'>";
            ?>
                    <select name='jugador<?php echo $i; ?>' id="jug <?php echo $i;?>" class='x' style='width: 200px'>
                        <?php
                        $jugadores = mysqli_query($conexion, "SELECT * FROM compite, tiene, jugador WHERE compite.IdPartido = $id and compite.IdEquipo = $data[IdEquipo] and tiene.IdEquipo = $data[IdEquipo] and tiene.IdJugador = jugador.IdJugador");

                        if (mysqli_num_rows($jugadores) > 0) {

                        ?> <option value='' selected>Seleccione un jugador</option> 
                        <?php
                         while ($datos = mysqli_fetch_array($jugadores)) {
                                ?>
                                <option value='<?php echo $datos['IdJugador'] ?>'><?php echo $datos['nomJug'] . ' ' . $datos['apeJug'] ?></option>
                            <?php
                                                                                    }
                                                                                } else {
                            ?> <option value='' selected>No hay jugadores</option> <?php
                                                                                }

                                                                                    ?>
                    </select>
                <?php
                    echo "<input type='number' id='anot$i' placeholder='Anotaciones' class='x' name='anotacion$i' style='width: 110px;' min='0'><br>";
                } else {
                    echo "<input type='number' placeholder='Posición' class='x' name='posEquipo$i' style='width: 100px;' min='1'> <br>";
                }

                if ($i == 1) {
                ?>
                    <input type='hidden' value='<?php echo $data['tipoPuntuacion'] ?>' name='tipoPunt'>
            <?php
                }
            }


            ?>

            <input type='hidden' value='<?php echo $i ?>' name='numEquipos'>
            <script>
                function requerir(id) {
                    console.log(document.getElementById('anot' + id));
                    document.getElementById('anot' + id).required = true;
                    console.log('anot' + id);

                    if ($('#punteq' + id).val().length == 0) {
                        document.getElementById('anot' + id).required = false;
                        document.getElementById('jug' + id).required = false;
                    } else {
                    }
                    document.getElementById('anot' + id).required = true;
                    document.getElementById('jug' + id).required = true;

                }
            </script>


            <input type="submit" name="enviar" value="Hecho" class="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../js/backoffice.js"></script>
</body>

</html>
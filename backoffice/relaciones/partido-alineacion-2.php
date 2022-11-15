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

    <title>Seleccionar roles</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    include '../backoffice-sidebar.php';

    $id = $_POST['id'];
    $equipo = $_POST['equipo'];
    $alineacion = $_POST['alineacion'];

    ?>

    <div class="title">
        <h1>Seleccione los roles</h1>
    </div>

    <div style="margin-top: 40px;">
        <form method="POST" action="../../controlador/partido-alineacion.php">
            <input type='hidden' value=<?php echo $id ?> name='id'>
            <input type='hidden' value=<?php echo $equipo ?> name='equipo'>
            <input type='hidden' value=<?php echo $alineacion ?> name='alineacion'>

            <?php
            $sql = mysqli_query($conexion, "SELECT COUNT(IdJugador) FROM tiene WHERE IdEquipo = $equipo");
            $equipos = mysqli_fetch_array($sql);
            $numJug = $equipos['COUNT(IdJugador)'];
            $sqlDep = mysqli_query($conexion, "SELECT IdDeporte from partido WHERE partido.IdPartido = $id");
            $arrDep = mysqli_fetch_array($sqlDep);
            $deporte = $arrDep['IdDeporte'];
            ?>
            <input type='hidden' value=<?php echo $numJug ?> name='numJug'>


            <?php
            $i = 0;
            $sql2 = mysqli_query($conexion, "SELECT * FROM tiene, jugador WHERE tiene.IdJugador = jugador.IdJugador and tiene.IdEquipo = $equipo");
            while ($data = mysqli_fetch_array($sql2)) {
                $i++;
                $check = 'check' . $i;
                $jug = 'jug' . $i;
            ?>
                <div class="divGral">
                <input type='hidden' value="<?php echo $data['IdJugador'] ?>" name="jug<?php echo $i; ?>">
                <input type='text' class='x' readonly style='width: auto; text-align: center; cursor: default' value="<?php echo $data['nomJug'] . ' ' . $data['apeJug'] ?>">

             
                <section id="select<?php echo $jug ?>" style='display: inline-block'>
                <select name="roljug<?php echo $i; ?>" id= "rolljug<?php echo $i; ?>" style='width: 110px'>
                        <option value=''>Posiciónes</option>
                        <?php
                            $sql = mysqli_query($conexion, "SELECT rol FROM posicion, tiene_una, alineacion WHERE alineacion.IdDeporte = $deporte and tiene_una.IdAlineacion = alineacion.IdAlineacion GROUP BY rol");
                            while ($data = mysqli_fetch_array($sql)){
							    echo "<option value='$data[rol]'> $data[rol] </option>";
                            }
                        ?>
                </select>
                <input type='button' class='x' style='width: 35px; height: 35px; cursor: pointer;' value='+' onclick='newRol("select<?php echo $jug ?>", "section<?php echo $i; ?>", <?php echo $i; ?>)'>
                </section>
               
                <section style='display: inline-block' id="section<?php echo $i; ?>">

            </section>
                <input type='checkbox' id="<?php echo $check; ?>" onclick="check('<?php echo 'roljug' . $i; ?>', '<?php echo 'rolljug' . $i; ?>')" name="<?php echo $check; ?>"><label> Este jugador no jugará</label><br>

                <script>
                    function check(input, input2) {
                            document.getElementById(input).toggleAttribute("disabled");
                            document.getElementById(input2).toggleAttribute("disabled");
                    }

                    function newRol(div, txtnew, x){
                
                        document.getElementById(txtnew).innerHTML = "<input type='text' class='x' id='roljug" + x + "' name='roljug" + x + "' style='width: 110px; text-align: center; display: block; margin-right: 58px' placeholder='Rol'>";
                        document.getElementById(div).style.display = 'none';
                    }
                </script>
            <?php
            }
            ?>

            <input type="submit" value="Continuar" class="enviar" name="enviar">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
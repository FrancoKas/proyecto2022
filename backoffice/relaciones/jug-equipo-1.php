<?php
if(isset($_POST['enviar'])){

$jugador = $_POST['jugador'];

?>
    <script>
        window.location = "jug-equipo-2.php?jug=<?php echo $jugador; ?>";
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/backoffice.css">
    <link rel="stylesheet" href="../../css/ingresarBack.css">
    <link rel="icon" href="../../images/logos/icon.png">

    <title>Seleccione un jugador</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Seleccione un jugador</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Jugador des-asignado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al des-asignar jugador.';
            mensajeError($mensaje);
        }
    }

    ?>

    <div style="margin-top: 40px;">
        <form method="POST">
            <select name='jugador' class='select' required>
                <option value=''>Seleccione un jugador</option>
                <?php
                $sql = mysqli_query($conexion, "SELECT * from jugador");

                while ($data = mysqli_fetch_array($sql)) {

                    echo '<option value="' . $data['IdJugador'] . '">' . $data['nomJug'] . ' ' . $data['apeJug'] . '</option>';
                }
                ?>
            </select><br>

            <input type="submit" value="Continuar" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
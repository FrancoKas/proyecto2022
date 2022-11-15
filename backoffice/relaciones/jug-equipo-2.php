<?php
if(isset($_POST['enviar'])){

$jugador = $_POST['jugador'];

?>
    <script>
        window.location = "jug-equipo-1.php?env=<?php echo $jugador; ?>";
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

    <title>Seleccione un equipo</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Seleccione un equipo</h1>
    </div>


    <div style="margin-top: 40px;">
        <form method="POST" action='../../controlador/eliminar-jug-equipo.php'>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['jug'] ?>">
            <select name='equipo' class='select' required>
                <option value=''>Seleccione un equipo</option>
                <?php
                $id = $_REQUEST['jug'];
                $sql = mysqli_query($conexion, "SELECT tiene.IdEquipo, equipo.nomEquipo from tiene, equipo WHERE tiene.IdJugador = '$id' and tiene.IdEquipo = equipo.IdEquipo");

                while ($data = mysqli_fetch_array($sql)) {

                    echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
                }
                ?>
            </select><br>

            <input type="submit" value="Des-asignar" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
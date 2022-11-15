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

    <title>Seleccionar una alineación</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    include '../backoffice-sidebar.php';

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
    } else { header('location: ../error.php'); }
    ?>

    <div class="title">
        <h1>Seleccione una alineación</h1>
    </div>

    <div style="margin-top: 40px;">
        <form method="POST" action="partido-alineacion-2.php">
            <input type='hidden' value= <?php echo $id?> name='id'>
            <label for="equipo">Equipo</label><br>
            <select name="equipo" class="select" required>
                <option value=''>Seleccione un equipo</option>
                <?php
                $sql = mysqli_query($conexion, "SELECT equipo.IdEquipo, equipo.nomEquipo from equipo, compite WHERE compite.IdPartido = $id and compite.IdEquipo = equipo.IdEquipo GROUP BY equipo.IdEquipo");

                while ($data = mysqli_fetch_array($sql)) {

                    echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
                }
                ?>
            </select> <br>
            <label for="alineacion">Alineacion del equipo</label><br>
            <select name="alineacion" class="select" required>
                <option value=''>Seleccione una alineacion</option>
                <?php
                $sql = mysqli_query($conexion, "SELECT alineacion.IdAlineacion, alineacion.nomAlineacion from alineacion, partido WHERE alineacion.IdDeporte = partido.IdDeporte and partido.IdPartido = $id");

                while ($data = mysqli_fetch_array($sql)) {
                    echo '<option value="' . $data['IdAlineacion'] . '">' . $data['nomAlineacion'] . '</option>';
                }
                ?>
            </select> <br>

            <input type="submit" value="Continuar" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../../js/backoffice.js"></script>
</body>

</html>
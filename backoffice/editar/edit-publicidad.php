
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/backoffice.css">
    <link rel="stylesheet" href="../../css/ingresarBack.css">
    <link rel="stylesheet" href="../../css/editaruser.css">
    <title>Editar publicidad</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Editar una publicidad</h1>
    </div>

    <div class="form">
        <form method="POST" enctype="multipart/form-data" action='../../controlador/editar-publicidad.php'>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
            <label for="deporte">Cambiar deporte</label><br>
            <select name="deporte" class="select">
                <option value="0">Seleccione un deporte</option>
                <option value="no">Sin deporte</option>
                <?php
                $sql = mysqli_query($conexion, "SELECT * from deporte");

                while ($data = mysqli_fetch_array($sql)) {

                    echo '<option value="' . $data['IdDeporte'] . '">' . $data['nomDeporte'] . '</option>';
                }
                ?>
            </select><br>
            <label for="nombre">Cambiar nombre de la publicidad</label><br>
            <input type="text" placeholder="Nombre de la publicidad" name="nombre" class="nPubli x"><br>
            <label for="foto">Cambiar imagen</label><br>
            <input type="file" placeholder="Imagen de la publicidad" name="foto" class="iPubli"><br>
            <label for="link">Cambiar link de la publicidad</label><br>
            <input type="url" placeholder="Link de la publicidad" name="link" class="linkPubli x"><br>
            <input type="submit" value="Actualizar datos" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/backoffice.js"></script>

</body>

</html>
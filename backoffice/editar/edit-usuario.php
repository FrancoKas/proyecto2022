<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/backoffice.css">
    <link rel="stylesheet" href="../../css/ingresarBack.css">
    <link rel="stylesheet" href="../../css/editaruser.css">
    <link rel="icon" href="../../images/logos/icon.png">
    <script>
        const fechafin = document.getElementById('fechafin');

        function mostrarFecha() {
            document.getElementById('fechafin').style.display = 'block';
            $('#fechafin').prop("required", true);
        }

        function ocultarFecha() {
            document.getElementById('fechafin').style.display = 'none';
            $('#fechafin').prop("required", false);

        }
    </script>
    <title>Editar usuario</title>
</head>

<body>

    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Editar usuario</h1>
    </div>

    <div class="form">
        <form method="POST" action='../../controlador/editar-usuario.php'>
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
            <label for="nombre">Nombre completo</label><br>
            <input type="text" placeholder="Nombre completo del usuario" name="nombre" class="nUsuario x" value="<?php echo $_REQUEST['name'] ?>" required><br>
            <label for="user">Nombre de usuario</label><br>
            <input type="text" placeholder="Nombre de usuario" name="user" class="nUsuario x" value="<?php echo $_REQUEST['user'] ?>" required><br>
            <label for="correo">Correo electrónico</label><br>
            <input type="text" placeholder="Correo electrónico" name="correo" class="mailUsuario x" value="<?php echo $_REQUEST['correo'] ?> " required><br>
            <label>Hacer premium</label>
            <input type='radio' name='premium' onclick="mostrarFecha()" value='1'>
            <label>Quitar premium</label>
            <input type='radio' name='premium' onclick="ocultarFecha()" value='0'>

            <label for="fechafin" id="labelffin" class="lffin">Fecha de finalización</label>
            <input type="date" class="fecha" id="fechafin" name="fechafin"><br>

            <input type="submit" value="Editar" class="enviar" name="enviar">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../js/backoffice.js"></script>

</body>

</html>
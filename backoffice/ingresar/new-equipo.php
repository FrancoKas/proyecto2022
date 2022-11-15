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
    <title>Agregar nuevo equipo</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

        <div class="title">
            <h1>Ingresar un nuevo equipo</h1>
        </div>

        <?php

		if (isset($_REQUEST['env'])) {
			$solicitud = $_REQUEST['env'];

			if ($solicitud == 1) {
				$mensaje = 'Equipo ingresado correctamente.';
				mensajeOK($mensaje);
			} else {
				$mensaje = 'Error al ingresar el equipo.';
				mensajeError($mensaje);
			}
		}

		?>

        <div>
            <form method="POST" action="../../controlador/ingresar-equipo.php" style='margin-top: 100px;' enctype="multipart/form-data">
                <label for="nEquipo">Nombre del equipo</label><br>
                <input type="text" placeholder="Nombre del equipo" name="nEquipo" class="nEquipo x" required><br>
                <br>
                <label for="pEquipo">País del equipo</label><br>
                <select name="pEquipo" class="select" required>
                    <option>Seleccione un país</option>
                    <script>
                        for (var x = 0; x < paises.length; x++)
                            document.write("<option value=" + paises[x] + ">" + paises[x] + "</option>");
                    </script>
                </select> <br>
                <label>Persona</label>
                <input type="radio" name='opc' value="persona" required>
                <label>Selección</label>
                <input type="radio" name='opc' value="seleccion" required>
                <label>Club</label>
                <input type="radio" name='opc' value="club" required>
                <br>
                <input type='file' name='img' required>
                <br>
                <input type="submit" value="Ingresar equipo" class="enviar" name="enviar">
            </form>
        </div>


</body>
<script src="../../js/backoffice.js"></script>

</html>
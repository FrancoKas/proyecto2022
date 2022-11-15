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
    
    <title>Agregar un nuevo jugador</title>
</head>

<body>
<?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

        <div class="title">
            <h1>Ingresar un nuevo jugador</h1>
        </div>

        <?php

		if (isset($_REQUEST['env'])) {
			$solicitud = $_REQUEST['env'];

			if ($solicitud == 1) {
				$mensaje = 'Jugador ingresado correctamente.';
				mensajeOK($mensaje);
			} else {
				$mensaje = 'Error al ingresar el jugador.';
				mensajeError($mensaje);
			}
		}

		?>

        <div style="margin-top: 40px;">
            <form method="POST" action="../../controlador/ingresar-jugador.php">
                <label for="nJugador">Nombre del jugador</label><br>
                <input type="text" placeholder="Nombre del jugador" name="nJugador" class="nJugador x" required><br>
                <label for="aJugador">Apellido del jugador</label><br>
                <input type="text" placeholder="Apellido del jugador" name="aJugador" class="aJugador x" required><br>
                <label for="eJugador">Edad</label><br>
                <input type="number" placeholder="Edad del jugador" name="eJugador" class="eJugador x" min='10' max='70' required><br>
                <label for="pJugador">País de nacimiento del jugador</label><br>
                <select name="pJugador" class="select" required>
                    <option value="" selected>Seleccione un país</option>
                    <script>
                        for (var x = 0; x < paises.length; x++)
                            document.write("<option value=" + paises[x]+ ">" + paises[x] + "</option>");
                    </script>
                </select> <br>

                <input type="submit" value="Ingresar jugador" class="enviar" name="enviar" style="cursor: pointer">
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../../js/backoffice.js"></script>
</body>

</html>
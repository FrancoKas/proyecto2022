<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../../images/logos/icon.png">
	<title>Agregar nuevo partido</title>
</head>

<body>
	<?php
	require_once '../../config/db.php';
	require '../mensajes.php';
	include '../backoffice-sidebar.php';
	?>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->

		<!-- NAVBAR -->
		<div class="title">
			<h1>Ingresar un nuevo partido</h1>
		</div>

		<?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Partido ingresado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al ingresar el partido.';
            mensajeError($mensaje);
        }
    }

    ?>

		<div class="form" style="height: 650px;">
			<form method="POST" action="../relaciones/partido-equipo.php">
				<label>Seleccion</label>
				<input type='radio' name='opcEquipo' value='seleccion' required>
				<label>Club</label>
				<input type='radio' name='opcEquipo' value='club' required>
				<label>Individual</label>
				<input type='radio' name='opcEquipo' value='individual' required><br>
				<label for="deporte">Deporte</label><br>
				<select class="select x" name="deporte" required>
					<option value="">Seleccione un deporte</option>
					<?php
					$sql = mysqli_query($conexion, "SELECT * from deporte");

					while ($data = mysqli_fetch_array($sql)) {

						echo '<option value="' . $data['IdDeporte'] . '">' . $data['nomDeporte'] . '</option>';
					}
					?>
				</select><br>
				<hr>
				<label for='abitro'>Arbitro</label><br>
				<select class="select x" name="arbitro" required>
					<option value="">Seleccione un arbitro</option>
					<?php
					$sql = mysqli_query($conexion, "SELECT * from arbitro");

					while ($data = mysqli_fetch_array($sql)) {

						echo '<option value="' . $data['IdArbitro'] . '">' . $data['nomArb'] . ' ' . $data['apeArb'] . '</option>';
					}
					?>
				</select><br>
				<hr>
				<label for="lugar">Lugar de realización del partido</label><br>
				<input type="text" placeholder="Lugar del partido" name="lugar" class="lPartido x" required><br>
				<hr>
				<label for="fecha">Fecha del partido</label><br>
				<input type="datetime-local" name="fecha" class="fPartido x" required><br>
				<label for="equipos">Cantidad de equipos en el partido</label><br>
				<input type="number" name="equipos" class="fPartido x" min='2' max='15' required><br>
				<input type="submit" name="enviar" value="Ingresar partido" class="enviar">
			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../../js/backoffice.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
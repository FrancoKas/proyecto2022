<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../../images/logos/icon.png">
	<title>Agregar equipo a un evento</title>
</head>

<body>
	<?php
	require_once '../../config/db.php';
	require '../mensajes.php';
	include '../backoffice-sidebar.php';
	?>


	<!-- NAVBAR -->
	<div class="title">
		<h1>Agregar equipo a evento</h1>
	</div>

	<?php

	if (isset($_REQUEST['env'])) {
		$solicitud = $_REQUEST['env'];

		if ($solicitud == 1) {
			$mensaje = 'Equipo asignado correctamente.';
			mensajeOK($mensaje);
		} else {
			$mensaje = 'Error al asignar el equipo.';
			mensajeError($mensaje);
		}
	}
	?>

	<div class="form" style="height: 400px;">
		<form method="POST" action="../../controlador/equipo-evento.php">
			<label for="evento">Eventos</label><br>
			<select name="evento" class="select" required>
				<option value="">Seleccione un evento</option>
				<?php
				$sql = mysqli_query($conexion, "SELECT * from evento");

				while ($data = mysqli_fetch_array($sql)) {

					echo '<option value="' . $data['IdEvento'] . '">' . $data['nomEvento'] . '</option>';
				}
				?>
			</select>
			<br>

			<input type="submit" name="enviar" value="Agregar partido al evento" class="enviar">

		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../js/backoffice.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
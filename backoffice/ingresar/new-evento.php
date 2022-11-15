<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../../images/logos/icon.png">
	<title>Agregar un nuevo evento</title>
</head>

<body>

	<!-- NAVBAR -->

	<?php
	require_once '../../config/db.php';
	require '../mensajes.php';
	include '../backoffice-sidebar.php';

	?>
	<div class="title">
		<h1>Ingresar un nuevo evento</h1>
	</div>

	<?php

	if (isset($_REQUEST['env'])) {
		$solicitud = $_REQUEST['env'];

		if ($solicitud == 1) {
			$mensaje = 'Evento ingresado correctamente.';
			mensajeOK($mensaje);
		} else {
			$mensaje = 'Error al ingresar el evento.';
			mensajeError($mensaje);
		}
	}

	?>

	<div class="form" style="height: 400px;">
		<form method="POST" action="../../controlador/ingresar-evento.php" enctype="multipart/form-data">
			<label for="deporte">Seleccione un deporte</label><br>
			<select name="deporte" class="select" required>
				<option value="">Seleccione un deporte</option>
				<?php
				$sql = mysqli_query($conexion, "SELECT * from deporte");

				while ($data = mysqli_fetch_array($sql)) {
					echo '<option value="' . $data['IdDeporte'] . '">' . $data['nomDeporte'] . '</option>';
				}
				?>
			</select>
			<br>
			<label for="evento">Nombre del evento</label><br>
			<input type="text" name="nomEvento" placeholder="Nombre del evento" class="x" required><br>
			<input type="file" name="imagen" placeholder="Imagen del evento" required><br>
			<input type="submit" name="enviar" value="Ingresar evento" class="enviar">

		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../../js/backoffice.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
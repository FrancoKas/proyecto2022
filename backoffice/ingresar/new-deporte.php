<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../images/logos/icon.png">
	<title>Agregar nuevo deporte</title>
</head>

<body>
	<?php
	require_once '../mensajes.php';
	include '../backoffice-sidebar.php';
	require_once '../../config/db.php';
	?>
		<!-- NAVBAR -->
		<div class="title">
			<h1>Ingresar un nuevo deporte</h1>
		</div>

		<?php

		if (isset($_REQUEST['env'])) {
			$solicitud = $_REQUEST['env'];

			if ($solicitud == 1) {
				$mensaje = 'Deporte ingresado correctamente.';
				mensajeOK($mensaje);
			} else {
				$mensaje = 'Error al ingresar el deporte.';
				mensajeError($mensaje);
			}
		}

		?>

		<div>
			<form method="POST" action="../../controlador/ingresar-deporte.php" style="margin-top: 100px;">
				<label for="nDeporte">Nombre del deporte</label><br>
				<input type="text" placeholder="Nombre del deporte" name="nDeporte" class="nDeporte x" required><br>
				<hr style="width: 300px; margin: 0 auto;">
				<label>Tipo</label><br>
				<label>Individual</label>
				<input type='radio' name='opc' value='individual' required>
				<label>Colectivo</label>
				<input type='radio' name='opc' value='colectivo' required><br>
				<hr style="width: 300px; margin: 0 auto;">
				<label>Puntuación</label><br>
				<label>Por puntos</label>
				<input type='radio' name='punt' value='Puntos' required>
				<label>Por posición</label>
				<input type='radio' name='punt' value='Posicion' required><br>
				<hr style="width: 300px; margin: 0 auto;">
				<input type="submit" value="Ingresar deporte" class="enviar" name="enviar">
			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../../js/backoffice.js"></script>
		<script src="../../js/nuevacat.js"></script>
</body>

</html>
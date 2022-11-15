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
		<h1>Des-asignar equipo de evento</h1>
	</div>

	<?php

	if (isset($_REQUEST['env'])) {
		$solicitud = $_REQUEST['env'];

		if ($solicitud == 1) {
			$mensaje = 'Equipo des-asignado correctamente.';
			mensajeOK($mensaje);
		} else {
			$mensaje = 'Error al des-asignar el equipo.';
			mensajeError($mensaje);
		}
	}

	if(!isset($_POST['evento'])){
		header('location: ../error.php');
	} else {
		$evento = $_POST['evento'];
	}
	?>

	<div class="form" style="height: 400px;">
		<form method="POST" action="../../controlador/equipo-evento.php">
			<input type='hidden' value="<?php echo $evento?>" name='delEvento'>
			<label for="evento">Equipos</label><br>
			<select name="delEquipo" class="select" required>
				<option value="">Seleccione un equipo</option>
				<?php
				$sql = mysqli_query($conexion, "SELECT * from equipo, participa_en WHERE participa_en.IdEvento = $evento and participa_en.IdEquipo = equipo.IdEquipo");

				while ($data = mysqli_fetch_array($sql)) {

					echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
				}
				?>
			</select>
			<br>

			<input type="submit" name="enviar" value="Eliminar" class="enviar">

		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../js/backoffice.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
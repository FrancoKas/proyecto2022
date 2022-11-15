

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../images/logos/icon.png">
	<title>Asignar jugador a un equipo</title>
</head>

<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Asignar jugador a un equipo</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Jugador asignado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al asignar el jugador.';
            mensajeError($mensaje);
        }
    }

		?>

		<div class="form" style='height: auto;'>
			<form method="POST" action="../../controlador/jugador-equipo.php">
				<select name="equipo" class="select" required>
					<option value="">Seleccione un equipo</option>
					<?php
					$sql = mysqli_query($conexion, "SELECT * from equipo");

					while ($data = mysqli_fetch_array($sql)) {

						echo '<option value="' . $data['IdEquipo'] . '">' . $data['nomEquipo'] . '</option>';
					}
					?>
				</select>
				<br>
				<select name="jugador" class="select" required>
					<option value="">Seleccione un jugador</option>
					<?php
					$sql2 = mysqli_query($conexion, "SELECT * from jugador");
					while ($data2 = mysqli_fetch_array($sql2)) {

						echo '<option value="' . $data2['IdJugador'] . '">' . $data2['nomJug'] . " " . $data2['apeJug'] . '</option>';
					}
					?>
				</select>
				<br><label for="fechainicio">Fecha de inicio del contrato</label>
				<br><input type="date" name="fechainicio" required>
				<br><label for="fechafin">Fecha de fin del contrato</label>
				<br><input type="date" name="fechafin" required>

				<br><input type="submit" value="Asignar jugador" class="enviar" name="enviar">
			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		
		<script src="../../js/backoffice.js"></script>
</body>

</html>
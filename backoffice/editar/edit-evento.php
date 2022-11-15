<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../images/logos/icon.png">
	<title>Editar eventos</title>
</head>

<body>
<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Editar un equipo</h1>
    </div>

    <?php
	require_once '../../config/db.php';

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Equipo editado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al editar el equipo.';
            mensajeError($mensaje);
        }
    }

    ?>
		<div class="form" style="height: 550px;">
			<form method="POST" action="../../controlador/editar-evento.php">

				<label for="evento">Eventos</label><br>
				<select name="evento" class="select" required>
					<option value="">Seleccione un evento</option>
					<?php
		
					$consulta = "SELECT * from evento";
					$resultado = $conexion->query($consulta);

					if ($resultado) {
						while ($valores1 = mysqli_fetch_array($resultado)) {
							echo '<option value="' . $valores1['IdEvento'] . '">' . $valores1['nomEvento'] . '</option>';
						}
					}
					?>
				</select><br>

				<label for="deporte">Seleccione un deporte</label><br>

				<input type="checkbox" name="chkDeporte" id="chkdeporte"><label for="cambiarDeporte"> Cambiar deporte</label><br>
				<hr>
				<select name="deporte" class="select" id="deporte">
					<option value="">Seleccione un deporte</option>
					<?php
					$sql2 = "SELECT * from deporte";
					$result2 = $conexion->query($sql2);

					if ($result2) {
						while ($valores2 = mysqli_fetch_array($result2)) {

							echo '<option value="' . $valores2['IdDeporte'] . '">' . $valores2['nomDeporte'] . '</option>';
						}
					}
					?>
				</select>
				<br>
				<label for="nomEvento">Nombre del evento</label><br>
				<input type="checkbox" name="chkNombre" id="chknombre"><label for="cambiarNombre"> Cambiar nombre</label><br>
				<hr>
				<label>Estado del evento</label><br>
				<label>Pendiente</label>
				<input type='radio' name='opc' value='Pendiente' required>
				<label>En competencia</label>
				<input type='radio' name='opc' value='Competencia' required>
				<label>Finalizado</label>
				<input type='radio' name='opc' value='Finalizado' required>
				<hr>
				<input type="text" name="nomEvento" placeholder="Nombre del evento" id="nomevento" class="x"><br>
				<input type="checkbox" name="eliminar" id="eliminar"><label for="eliminar"> Eliminar evento</label><br>
				<input type="submit" name="enviar" value="Editar evento" class="enviar">

			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../../js/backoffice.js"></script>
		<script src="../js/eevento.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
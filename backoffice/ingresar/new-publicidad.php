<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../../images/logos/icon.png">
	<title>Agregar publicidad</title>
</head>

<body>
<?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

        <div class="title">
            <h1>Ingresar una publicidad</h1>
        </div>

        <?php

		if (isset($_REQUEST['env'])) {
			$solicitud = $_REQUEST['env'];

			if ($solicitud == 1) {
				$mensaje = 'Publicidad ingresada correctamente.';
				mensajeOK($mensaje);
			} else {
				$mensaje = 'Error al ingresar publicidad.';
				mensajeError($mensaje);
			}
		}

		?>

		<div style="margin-top: 30px;">
			<form method="POST" action="../../controlador/ingresar-publicidad.php" enctype="multipart/form-data">
				<label for="deporte">Seleccione un deporte</label><br>
				<select name="deporte" class="select">
					<option value="0">Seleccione un deporte</option>
					<?php
					$sql = mysqli_query($conexion, "SELECT * from deporte");

					while ($data = mysqli_fetch_array($sql)) {

						echo '<option value="' . $data['IdDeporte'] . '">' . $data['nomDeporte'] . '</option>';
					}
					?>
				</select><br>
				<label for="nPubli">Nombre de la publicidad</label><br>
				<input type="text" placeholder="Nombre de la publicidad" name="nPubli" class="nPubli x" required><br>
				<label for="iPubli">Imagen</label><br>
				<input type="file" placeholder="Imagen de la publicidad" name="iPubli" class="iPubli" required><br>
				<label for="linkPubli">Link de la publicidad</label><br>
				<input type="url" placeholder="Link de la publicidad" name="linkPubli" class="linkPubli x" required><br>
				<input type="submit" value="Actualizar datos" class="enviar" name="enviar">
			</form>
		</div>



		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../../js/backoffice.js"></script>
</body>

</html>
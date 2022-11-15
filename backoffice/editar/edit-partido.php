<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../../images/logos/icon.png">
	<title>Editar partidos</title>
</head>

<body>
	<?php
	require_once '../../config/db.php';
	require '../mensajes.php';
	include '../backoffice-sidebar.php';
	$partido = $_POST['partido'];
	?>

	<div class="title">
		<h1>Editar un partido</h1>
	</div>

	<div class="form">
		<form method="POST" action="../../controlador/editar-partido.php">

			<input type='hidden' value='<?php echo $partido ?>' name='id'>
			<label>Desea editar los equipos?</label><br>
			<label>Si</label>
			<input type='radio' value='si' name='editar' required>
			<label>No</label>
			<input type='radio' value='no' name='editar' required><br>
			<hr><br>
			<label for="fPartido">Fecha del partido</label><br>
			<input type="datetime-local" name="fecha" class="fPartido x" id="fecha"><br><br>
			<hr><br>
			<label>Estado del partido</label><br><br>
			<label>Programado</label>
			<input type='radio' value='Programado' name='estado' required>
			<label>En curso</label>
			<input type='radio' value='En curso' name='estado' required>
			<label>Finalizado</label>
			<input type='radio' value='Finalizado' name='estado' required>
			<label>Cancelado</label>
			<input type='radio' value='Cancelado' name='estado' required><br><br>
			<hr>
			<label for="eliminar">Eliminar partido</label>
			<input type="checkbox" name="eliminar" class="eliminar" id="eliminar"><br>
			<hr>


			<?php
			if (isset($_POST['edit'])) {
				$editOpc = $_POST['edit'];
			?>
				<input type='hidden' name='edit' value=<?php echo $editOpc; ?>>
				<?php
				if ($editOpc == 'even') {
				?>
					<label>Asignar a evento</label><br>
					<select name='evento' class='select x' required>
						<option value=''>Seleccione un evento</option>
						<?php
						$sql = mysqli_query($conexion, "SELECT IdEvento, nomEvento FROM evento");

						while ($data = mysqli_fetch_array($sql)) {
							echo "<option value='$data[IdEvento]'> $data[nomEvento] </option>";
						}
						?>
					</select><br>
				<?php
				} else if ($editOpc == 'res') {

				?>
					<script>
						window.location = "edit-resultado.php?id=<?php echo $partido; ?>";
					</script>;
				<?php
				} else if($editOpc == 'inci'){
					?>
					<script>
						window.location = "../ingresar/new-incidencia.php?id=<?php echo $partido; ?>";
					</script>;
				<?php
				} else if($editOpc == 'alin'){
					?>
					<script>
						window.location = "../relaciones/partido-alineacion.php?id=<?php echo $partido; ?>";
					</script>;
				<?php
				}
			}
			?>
			<input type="submit" name="enviar" value="Continuar" class="enviar">
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../../js/backoffice.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
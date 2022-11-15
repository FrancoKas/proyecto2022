<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../../css/backoffice.css">
	<link rel="stylesheet" href="../../css/ingresarBack.css">
	<link rel="icon" href="../../images/logos/icon.png">
	<title>Editar deportes</title>
</head>
<body>
    <?php
    require_once '../../config/db.php';
    require '../mensajes.php';
    include '../backoffice-sidebar.php';
    ?>

    <div class="title">
        <h1>Editar un deporte</h1>
    </div>

    <?php

    if (isset($_REQUEST['env'])) {
        $solicitud = $_REQUEST['env'];

        if ($solicitud == 1) {
            $mensaje = 'Deporte editado correctamente.';
            mensajeOK($mensaje);
        } else {
            $mensaje = 'Error al editar el deporte.';
            mensajeError($mensaje);
        }
    }

    ?>


		<form method="POST" action="../../controlador/editar-deporte.php" style="margin-top: 50px;">
			<select name="deporte" class="select">
            <option value="">Seleccione un deporte</option>
            <?php
                $sql= mysqli_query($conexion, "SELECT IdDeporte, nomDeporte from deporte");
                    
                while ($data = mysqli_fetch_array($sql)) {
                                    
                echo '<option value="'.$data['IdDeporte'].'">'.$data['nomDeporte'].'</option>';
            }
            ?>
            </select><br>
			<label for="nombre">Nombre del deporte</label><br>
			<input type="text" placeholder="Nombre del deporte" name="nombre" class="nDeporte x" required><br>
			<select name="select" id="selDeporte" class="select">
			<option value="">Seleccione una categoría</option>
            <?php
                $sql2= mysqli_query($conexion, "SELECT categoria from deporte");
                    
                while ($data2 = mysqli_fetch_array($sql2)) {
                                    
                echo '<option value="'.$data2['categoria'].'">'.$data2['categoria'].'</option>';
            }
            ?>
            </select>
			<input type='button' href="#" id="nuevaCat" class="nueva" value='+'>
			<label for="cat" id="labelCat" class="labelCat">Categoría del deporte</label>
			<input type="text" id="cDeporte" placeholder="Nueva categoría" name="categoria" class="cDeporte x"  style="margin: 0 auto;"><br>
			<input type="submit" value="Editar datos" class="enviar" name="enviar">
		</form>


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../../js/backoffice.js"></script>
	<script src="../../js/nuevacat.js"></script>
</body>
</html>
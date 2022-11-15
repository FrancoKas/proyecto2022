<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../css/backoffice.css">
	<link rel="icon" href="../images/logos/icon.png">
	<title>Administrar usuarios</title>
</head>

<body>
	<?php
	require_once '../config/db.php';
	require_once 'mensajes.php';
	?>
	<section id="sidebar">
		<a href="backoffice.html" class="brand"><img src="../images/logos/logo_black.png" class="logo" style="width: 300px; height: 100px; margin-top: 30px;"></a>
		<ul class="side-menu">

			<li><a href="backoffice.php"><i class='bx bxs-dashboard icon'></i> Panel de control</a></li>
			<li class="divider" data-text="main">INICIO</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Partidos <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-partido.php">Nuevo partido</a></li>
					<li><a href="partidos.php">Editar partidos</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Deportes <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-deporte.php">Nuevo deporte</a></li>
					<li><a href="editar/edit-deporte.php">Editar deportes</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Equipos <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-equipo.php">Nuevo equipo</a></li>
					<li><a href="relaciones/jugador-equipo.php">Agregar jugador</a></li>
					<li><a href="editar/edit-equipo.php">Editar equipos</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Jugadores <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-jugador.php">Nuevo jugador</a></li>
					<li><a href="editar/edit-jugador.php">Editar jugadores</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Eventos <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-evento.php">Nuevo evento</a></li>
					<li><a href="relaciones/equipo-evento.php">Añadir equipo</a></li>
					<li><a href="relaciones/partido-evento.php">Añadir partido</a></li>
					<li><a href="editar/edit-evento.php">Editar eventos</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Arbitros <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-arbitro.php">Nuevo arbitro</a></li>
					<li><a href="editar/edit-arbitro.php">Editar eventos</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Alineaciones <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-alineacion.php">Nueva Alineacion</a></li>
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-inbox icon'></i> Publicidades <i class='bx bx-chevron-right icon-right'></i></a>
				<ul class="side-dropdown">
					<li><a href="ingresar/new-publicidad.php">Nueva publicidad</a></li>
					<li><a href="adminPublicidades.php">Editar publicidades</a></li>
				</ul>
			</li>
			<li><a href="adminUsuarios.php"><i class='bx bxs-widget icon'></i> Administrar usuarios</a></li>
		</ul>
		<div class="ads">
		</div>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar'></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Buscar...">
					<i class='bx bx-search icon'></i>
				</div>
			</form>
			<span class="divider"></span>
		</nav>

		<?php

		if (isset($_REQUEST['env'])) {
			$solicitud = $_REQUEST['env'];

			if ($solicitud == 1) {
				$mensaje = 'Usuario editado correctamente.';
				mensajeOK($mensaje);
			} else {
				$mensaje = 'Error al editar el usuario.';
				mensajeError($mensaje);
			}
		}

		?>


		<!-- NAVBAR -->
		<div class="divTabla" style="margin-top: 120px; height: 100%;">
			<table class="tabla">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Acción</th>
				</tr>
				<?php

				$query = mysqli_query($conexion, "SELECT idUsuario, nomCompleto, correo, user FROM usuario");
				$result = mysqli_num_rows($query);

				if ($result > 0) {
					while ($data = mysqli_fetch_array($query)) {
				?>

						<tr>
							<td><?php echo $data["idUsuario"]; ?></td>
							<td><?php echo $data["nomCompleto"]; ?></td>
							<td><?php echo $data["correo"]; ?></td>
							<td><?php echo $data["user"]; ?></td>
							<td>
								<a class="delete" href="../controlador/eliminar-usuario.php?id=<?php echo $data["idUsuario"]; ?>">Eliminar</a>
								<a class="edit" href="editar/edit-usuario.php?id=<?php echo $data["idUsuario"]; ?>&user=<?php echo $data["user"]; ?>&name=<?php echo $data["nomCompleto"]; ?>&correo=<?php echo $data["correo"]; ?>">Editar</a>
							</td>
						</tr>
				<?php
					}
				}


				?>
			</table>
		</div>


		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="../js/backoffice.js"></script>
		<script src="../js/adminUsuarios.js"></script>
</body>

</html>
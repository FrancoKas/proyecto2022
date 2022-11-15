<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/backoffice.css">
    <link rel="stylesheet" href="../css/ingresarBack.css">
    <link rel="icon" href="../images/logos/icon.png">
    <title>Partidos</title>
</head>

<body>
    <?php
    require_once '../config/db.php';
    require_once 'mensajes.php';
    ?>
    <section id="sidebar">
		<a href="backoffice.html" class="brand"><img src="../images/logos/logo_black.png" class="logo" style="width: 300px; height: 100px; margin-top: 30px;"></a>
		<ul class="side-menu">

			<li><a href="backoffice.html"><i class='bx bxs-dashboard icon'></i> Panel de control</a></li>
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

    <section id="content">
		<nav>
			
			
			<span class="divider"></span>
		</nav>
    
    <!-- SIDEBAR -->
        <?php
            $sql = mysqli_query($conexion, "SELECT * FROM partido, compite, equipo, deporte WHERE partido.IdPartido = compite.IdPartido and compite.IdEquipo = equipo.IdEquipo and partido.IdDeporte = deporte.IdDeporte GROUP BY partido.IdPartido ORDER BY compite.IdPartido ASC");


            ?>
            

        <div class="divTabla" style="margin-top: 120px; height: 100%;">
            
            <table class="tabla">


                <tr style="text-align: center">
                    <th>Id Partido</th>
                    <th>Deporte</th>
                    <?php

                    $columna = mysqli_query($conexion, "SELECT count(IdPartido) from compite group by IdPartido having count(IdPartido)>1 ORDER BY IdPartido DESC LIMIT 1");
                    $array = mysqli_fetch_array($columna);
                    $col = $array['count(IdPartido)'];
                    for ($i = 0; $i < $col; $i++) {
                        $a = $i + 1;
                        echo "<th>Equipo $a</th>";
                    }
                    ?>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr style="text-align: center">
                        <td><?php echo $data["IdPartido"]; ?></td>
                        <td><?php echo $data["nomDeporte"]; ?></td>
                        <?php
                        $x = 0;

                        $sql2 = mysqli_query($conexion, "SELECT nomEquipo FROM equipo, compite WHERE IdPartido = '$data[IdPartido]' and compite.IdEquipo = equipo.IdEquipo");


                        while ($data2 = mysqli_fetch_array($sql2)) {

                        ?>
                            <td><?php echo $data2["nomEquipo"]; ?></td>
                        <?php

                        }

                        ?>

                    </tr>
                <?php
                }
                ?>
            </table>
            
        </div>

        <form method="POST" action="editar/edit-partido.php" style='margin: 0 auto'>
                <select class="select x" name='partido' style='width: auto' required>
                    <?php
            $partidos = mysqli_query($conexion, "SELECT * FROM partido, compite, equipo, deporte WHERE partido.IdPartido = compite.IdPartido and compite.IdEquipo = equipo.IdEquipo and partido.IdDeporte = deporte.IdDeporte GROUP BY partido.IdPartido");

                    while ($dato = mysqli_fetch_array($partidos)) {

                        echo "<option value='$dato[IdPartido]'> ID: $dato[IdPartido] | Deporte: $dato[nomDeporte] | Fecha: $dato[fecha] </option>";
                    }
                    ?>
                </select>
                <br>
                <label>Editar resultado</label>
                <input type='radio' name='edit' value='res'>
                <label>Ingresar incidencia</label>
                <input type='radio' name='edit' value='inci'>
                <label>Asignar una alineación</label>
                <input type='radio' name='edit' value='alin'>
                <label>Asignar a evento</label>
                <input type='radio' name='edit' value='even'>
                <label>Des-Asignar de evento</label>
                <input type='radio' name='edit' value='noeven'>
                <br>
                <input type='submit' value='Continuar' class='enviar' name='enviar'>
            </form><br>

        


        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../js/backoffice.js"></script>
        <script src="../js/adminUsuarios.js"></script>
</body>

</html>
<?php

require "../config/db.php";
require "../modelo/general-model.php";


if (isset($_POST['enviar'])) {
    $equipo = $_POST['equipo'];
    $jugador = $_POST['jugador'];
    $inicio = $_POST['fechainicio'];
    $fin = $_POST['fechafin'];


    if ($inicio < $fin) {
        insertarDatos('tiene', 'IdEquipo, inicioContrato, finContrato, IdJugador', "$equipo, '$inicio', '$fin', $jugador", $conexion);
        $envio = 1;
    } else {
        $envio = 0;
    }
?>
    <script>
        window.location = "../backoffice/relaciones/jugador-equipo.php?env=<?php echo $envio; ?>";
    </script>;
<?php
}

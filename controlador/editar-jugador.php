<?php

require_once '../config/db.php';
require_once '../modelo/jugador-model.php';

if (isset($_POST['enviar'])) {

    $envio = 0;

    $jugador = $_POST['jugador'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $pais = $_POST['pais'];

    if (isset($nombre)) {
        editarJugador($jugador, $nombre, NULL, NULL, NULL, $conexion);
        $envio = 1;
    }

    if (isset($apellido)) {
        editarJugador($jugador, NULL, $apellido, NULL, NULL, $conexion);
        $envio = 1;
    }

    if (isset($edad)) {
        editarJugador($jugador, NULL, NULL, $edad, NULL, $conexion);
        $envio = 1;
    }

    if (isset($pais)) {
        editarJugador($jugador, NULL, NULL, NULL, $pais, $conexion);
        $envio = 1;
    }


} else {
    $envio = 0;
}

?>

    <script>
        window.location = "../backoffice/editar/edit-jugador.php?env=<?php echo $envio; ?>";
    </script>

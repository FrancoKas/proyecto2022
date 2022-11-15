<?php

require_once '../config/db.php';
require_once '../modelo/equipo-model.php';

if (isset($_POST['enviar'])) {

    $equipo = $_POST['equipo'];
    $nombre = $_POST['nombre'];
    $pais = $_POST['pais'];

    if (isset($nombre)) {
        editarEquipo($equipo, $nombre, NULL, $conexion);
        $envio = 1;
    }

    if (isset($pais)) {
        editarEquipo($equipo, NULL, $pais, $conexion);
        $envio = 1;
    }


} else {
    $envio = 0;
}

?>

    <script>
        window.location = "../backoffice/editar/edit-equipo.php?env=<?php echo $envio; ?>";
    </script>

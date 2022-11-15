<?php

require_once '../config/db.php';
require_once '../modelo/arbitro-model.php';

if (isset($_POST['enviar'])) {

    $arbitro = $_POST['arbitro'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $deporte = $_POST['deporte'];

    if (isset($nombre)) {
        editarArbitro($arbitro, $nombre, NULL, NULL, $conexion);
        $envio = 1;
    }

    if (isset($apellido)) {
        editarArbitro($arbitro, NULL, $apellido, NULL, $conexion);
        $envio = 1;
    }

    if (isset($deporte)) {
        editarArbitro($arbitro, NULL, NULL, $deporte, $conexion);
        $envio = 1;
    }

} else {
    $envio = 0;
}

?>

    <script>
        window.location = "../backoffice/editar/edit-arbitro.php?env=<?php echo $envio; ?>";
    </script>

<?php

require_once '../config/db.php';
require_once '../modelo/general-model.php';

if (isset($_POST['enviar'])) {

    $envio = 0;
    $publi = $_POST['id'];
    $deporte = $_POST['deporte'];
    $nombre = $_POST['nombre'];
    $foto = $_FILES['foto'];
    $link = $_POST['link'];

    if (isset($foto)) {
        $data = ingresarImagen($foto, 'publicidades');
        editarDatos('publicidad', "imagen = '$data'", "IdPublicidad = $publi", $conexion);
        $envio = 1;
    }

    if (!empty($nombre)) {
        editarDatos('publicidad', "nomPublicidad = '$nombre'", "IdPublicidad = $publi", $conexion);
        $envio = 1;
    }

    if (!empty($link)) {
        editarDatos('publicidad', "link = '$link'", "IdPublicidad = $publi", $conexion);
        $envio = 1;
    }

    if (!empty($deporte)) {

        if ($deporte == 'no') {
             editarDatos('publicidad', "IdDeporte = NULL", "IdPublicidad = $publi", $conexion);
            $envio = 1;
        } else if ($deporte == 0) {
            $envio = 0;
        } else if ($deporte > 0) {
             editarDatos('publicidad', "IdDeporte = $deporte", "IdPublicidad = $publi", $conexion);
            $envio = 1;
        }
    }
} else {
    $envio = 0;
}

?>
        <script>
            window.location = "../backoffice/adminPublicidades.php?env=<?php echo $envio; ?>";
        </script>


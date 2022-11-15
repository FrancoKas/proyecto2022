<?php

require_once '../config/db.php';
require_once '../modelo/general-model.php';

if (isset($_POST['enviar'])) {

    $evento = $_POST['evento'];

    if (isset($_POST['eliminar'])) {
        eliminarDatos('evento', "IdEvento = $evento", $conexion);
        $envio = 2;
    } else {
    ?>
        <script>
            window.location = "../backoffice/editar/edit-evento.php?env=<?php echo $envio; ?>";
        </script>
    <?php
    }


    if (isset($_POST['chkDeporte'])) {
        $deporte = $_POST['deporte'];
        editarDatos('evento', "IdDeporte = $deporte", "IdEvento = $evento", $conexion);
        $envio = 1;
    }

    if (isset($_POST['chkNombre'])) {
        $nombre = $_POST['nomEvento'];
        editarDatos('evento', "nomEvento = '$nombre'", "IdEvento = $evento", $conexion);
        $envio = 1;
    }

    if(isset($_POST['opc'])) {
        $opc = $_POST['opc'];
        editarDatos('evento', "estadoEvento = '$opc'", "IdEvento = $evento", $conexion);
        $envio = 1;
    }




    ?>
    <script>
        window.location = "../backoffice/editar/edit-evento.php?env=<?php echo $envio; ?>";
    </script>
<?php


}





?>
<?php

require_once "../config/db.php";
require '../modelo/deporte-model.php';

if (isset($_POST['enviar'])) {

    $deporte = $_POST['deporte'];
    $nombre = $_POST['nombre'];
    $select = $_POST['select'];
    $categoria = $_POST['categoria'];

    if (!empty($categoria)) {

        if(editarDeporte($deporte, $nombre, $categoria, $conexion)){
            $envio = 1;
        } else {
            $envio = 0;
        } 
    } else if ($select > 0) {

        if(editarDeporte($deporte, $nombre, $select, $conexion)){
            $envio = 1;
        } else {
            $envio = 0;
        }

    }
    
    } else {
        $envio = 0;
    }


?>
        <script>
            window.location = "../backoffice/editar/edit-deporte.php?env=<?php echo $envio; ?>";
        </script>


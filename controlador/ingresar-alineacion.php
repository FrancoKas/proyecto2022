<?php

    require_once "../config/db.php";
    require_once "../modelo/general-model.php";

    if(isset($_POST['enviar'])){

        $deporte = $_POST['deporte'];
        $nombre = $_POST['nombre'];

        if(existenDatos('alineacion', "nomAlineacion = '$nombre'", $conexion) == 0){
            if(insertarDatos('alineacion', 'nomAlineacion, IdDeporte', "'$nombre', $deporte", $conexion)){
                
                header("location: ../backoffice/ingresar/new-alineacion.php?env=1");
            } else {
                header("location: ../backoffice/ingresar/new-alineacion.php?env=0");
            }
        } else {
            header("location: ../backoffice/ingresar/new-alineacion.php?env=0");
        }

        


    }

?>
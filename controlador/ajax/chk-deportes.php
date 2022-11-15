<?php  

    require_once '../../config/db.php';

    $deps = mysqli_query($conexion, "SELECT nomDeporte, IdDeporte FROM deporte");

    $json = array();
    while($datos = mysqli_fetch_array($deps)){

        $json[] = array(
                    'nombre' => $datos['nomDeporte'],
                    'id' => $datos['IdDeporte'],
        );
    }

    $json = json_encode($json);

    echo $json;

?>
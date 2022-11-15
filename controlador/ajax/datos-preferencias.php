<?php  

    require_once '../../config/db.php';

    $cls = mysqli_query($conexion, "SELECT publicidad.IdPublicidad, deporte.nomDeporte, publicidad.IdDeporte FROM deporte, publicidad WHERE publicidad.IdDeporte = deporte.IdDeporte");

    $json = array();
    while($datos = mysqli_fetch_array($cls)){

        $json[] = array(
                    'idpublicidad' => $datos['IdPublicidad'],
                    'iddeporte' => $datos['IdDeporte'],
                    'nomdeporte' => $datos['nomDeporte'],
        );
    }

    $jsonstr = json_encode($json);

    echo $jsonstr;

?>
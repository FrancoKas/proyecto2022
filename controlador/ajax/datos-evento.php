<?php

require_once "../../config/db.php";


$sql = mysqli_query($conexion, "SELECT nomEvento, nomDeporte, IdEvento, imagenEvento, estadoEvento from evento, deporte where evento.IdDeporte = deporte.IdDeporte order by rand()");
$json = array();


while ($data = mysqli_fetch_array($sql)) {
    
    $json[] = array(
        'evento' => $data['nomEvento'],
        'deporte' => $data['nomDeporte'],
        'id' => $data['IdEvento'],
        'img' => $data['imagenEvento'],
        'estado' => $data['estadoEvento'],
    );
    
}

$jsonstr = json_encode($json);
echo $jsonstr;



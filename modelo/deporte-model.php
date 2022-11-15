<?php


function ingresarDeporte($nombre, $puntuacion, $conexion)
{
    $sql = mysqli_query($conexion, "INSERT INTO deporte (nomDeporte, tipoPuntuacion) VALUES ('" . $nombre . "', '" . $puntuacion . "')");

    return $sql;
}



function editarDeporte($id, $nombre, $categoria, $conexion)
{

    if ($nombre != NULL) {
        $sql = mysqli_query($conexion, "UPDATE deporte SET nomDeporte = '$nombre' WHERE IdDeporte = '$id'");
    } 
    
    if ($categoria != NULL) {
        $sql = mysqli_query($conexion, "UPDATE deporte SET categoria = '$categoria' WHERE IdDeporte = $id");
    }

    return $sql;
}



function mostrarDeporte($seleccion, $condicion, $conexion)
{

    $consulta = mysqli_query($conexion, "SELECT $seleccion FROM deporte WHERE $condicion");
    
    $deporte = mysqli_fetch_array($consulta);

    return $deporte['IdDeporte'];
}



function eliminarDeporte($id, $conexion)
{
    return mysqli_query($conexion, "DELETE FROM deporte WHERE IdDeporte = $id");
}

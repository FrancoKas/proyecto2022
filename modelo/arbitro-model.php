<?php


function ingresarArbitro($nombre, $apellido, $deporte, $conexion)
{   

    $sql = mysqli_query($conexion, "INSERT INTO arbitro (nomArb, apeArb, IdDeporte) VALUES ('" . $nombre . "', '" . $apellido . "', '" . $deporte . "')");

    return $sql;
}



function editarArbitro($id, $nombre, $apellido, $deporte, $conexion)
{

    if ($nombre != NULL) {
        $sql = mysqli_query($conexion, "UPDATE arbitro SET nomArb = '$nombre' WHERE IdArbitro = '$id'");
        return $sql;
    } 
    
    else if ($apellido != NULL) {

        $sql = mysqli_query($conexion, "UPDATE arbitro SET apeArb = '$apellido' WHERE IdArbitro = $id");
        return $sql;
    }

    else if ($deporte != NULL) {

        $sql = mysqli_query($conexion, "UPDATE arbitro SET IdDeporte = '$deporte' WHERE IdArbitro = $id");
        return $sql;
    }

}



function mostrarArbitro($seleccion, $condicion, $conexion)
{

    $consulta = mysqli_query($conexion, "SELECT $seleccion FROM arbitro WHERE $condicion");
    
    $arbitro = mysqli_fetch_array($consulta);

    return $arbitro;
}



function eliminarArbitro($id, $conexion)
{
    return mysqli_query($conexion, "DELETE FROM arbitro WHERE IdArbitro = $id");
}

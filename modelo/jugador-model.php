<?php


function ingresarJugador($nombre, $apellido, $edad, $pais, $conexion)
{   

    $sql = mysqli_query($conexion, "INSERT INTO jugador (nomJug, apeJug, edad, nacionalidad) VALUES ('" . $nombre . "', '" . $apellido . "', '" . $edad . "', '" . $pais . "')");

    return $sql;
}



function editarJugador($id, $nombre, $apellido, $edad, $pais, $conexion)
{

    if ($nombre != NULL) {
        $sql = mysqli_query($conexion, "UPDATE jugador SET nomJug = '$nombre' WHERE IdJugador = '$id'");
        return $sql;
    } 
    
    if ($pais != NULL) {

        $sql = mysqli_query($conexion, "UPDATE jugador SET nacionalidad = '$pais' WHERE IdJugador = $id");
        return $sql;
    }

    if ($apellido != NULL) {

        $sql = mysqli_query($conexion, "UPDATE jugador SET apeJug = '$apellido' WHERE IdJugador = $id");
        return $sql;
    }

    if ($edad != NULL) {

        $sql = mysqli_query($conexion, "UPDATE jugador SET edad = '$edad' WHERE IdJugador = $id");
        return $sql;
    }
}



function mostrarJugador($seleccion, $condicion, $conexion)
{

    $consulta = mysqli_query($conexion, "SELECT $seleccion FROM jugador WHERE $condicion");
    
    $jugador = mysqli_fetch_array($consulta);

    return $jugador['IdJugador'];
}



function eliminarJugador($id, $conexion)
{
    return mysqli_query($conexion, "DELETE FROM jugador WHERE IdJugador = $id");
}

<?php


function ingresarEquipo($nombre, $pais, $imagen, $conexion)
{   

    $sql = mysqli_query($conexion, "INSERT INTO equipo (nomEquipo, paisEquipo, Imagen) VALUES ('" . $nombre . "', '" . $pais . "', '" . $imagen . "')");

    return $sql;
}



function editarEquipo($id, $nombre, $pais, $conexion)
{

    if ($nombre != NULL) {
        $sql = mysqli_query($conexion, "UPDATE equipo SET nomEquipo = '$nombre' WHERE IdEquipo = '$id'");
    } 
    
    else if ($pais != NULL) {
        $sql = mysqli_query($conexion, "UPDATE equipo SET paisEquipo = '$pais' WHERE IdEquipo = $id");
    }

    return $sql;
}



function mostrarEquipo($seleccion, $condicion, $conexion)
{

    $consulta = mysqli_query($conexion, "SELECT $seleccion FROM equipo WHERE $condicion");
    
    $equipo = mysqli_fetch_array($consulta);

    return $equipo['IdEquipo'];
}



function eliminarEquipo($id, $conexion)
{
    return mysqli_query($conexion, "DELETE FROM equipo WHERE IdEquipo = $id");
}

<?php


    function insertarDatos($tabla, $columnas, $datos, $conexion){
        $sql = mysqli_query($conexion, "INSERT INTO $tabla ($columnas) VALUES ($datos)");

        return "INSERT INTO $tabla ($columnas) VALUES ($datos)";
    }


    function mostrarDatos($tabla, $datos, $condicion, $conexion){
        $data = mysqli_query($conexion, "SELECT $datos FROM $tabla WHERE $condicion");

        return mysqli_fetch_array($data);
    }


    function existenDatos($tabla, $condicion, $conexion){

        $data = mysqli_query($conexion, "SELECT * FROM $tabla WHERE $condicion");

        $cuenta = mysqli_num_rows($data);
        return $cuenta;
    }

    
    function ingresarImagen($foto, $dir){

    $tmp_name = $foto['tmp_name'];
    $directorio_destino = "../images/$dir/";

    $img_file = $foto['name'];
    $img_type = $foto['type'];

    if (((strpos($img_type, "jpg") || strpos($img_type, "jpeg") || strpos($img_type, "png") || strpos($img_type, "webp")))) {

        $destino = $img_file;
        if (move_uploaded_file($tmp_name, $directorio_destino . $img_file)) {
            return $destino;
        }
    } else{
    return false;
    }
    }

    function editarDatos($tabla, $dato, $condicion, $conexion){
        $sql = mysqli_query($conexion, "UPDATE $tabla SET $dato WHERE $condicion");

        return "UPDATE $tabla SET $dato WHERE $condicion";
    }

    function eliminarDatos($tabla, $condicion, $conexion){
        $sql = mysqli_query($conexion, "DELETE FROM $tabla WHERE $condicion");

        return $sql;
    }
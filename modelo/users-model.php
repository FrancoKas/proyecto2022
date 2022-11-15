<?php


function ingresarUser($nombre, $user, $correo, $pass, $foto, $conexion)
{
    $sql = mysqli_query($conexion, "INSERT INTO usuario (nomCompleto, user, correo, pass, foto) 
                VALUES ('" . $nombre . "', '" . $user . "', '" . $correo . "', '" . $pass . "', '" . $foto . "')");
    return $sql;
}



function editarUser($id, $nombre, $correo, $pass, $foto, $user, $conexion)
{

    if ($pass != NULL) {
        mysqli_query($conexion, "UPDATE usuario SET pass = '$pass' WHERE idUsuario = '$id'");
    }
    if($nombre != NULL){
        mysqli_query($conexion, "UPDATE usuario SET nomCompleto = '$nombre' WHERE idUsuario = $id");
    }
    if($correo != NULL){
        mysqli_query($conexion, "UPDATE usuario SET correo = '$correo' WHERE idUsuario = $id");
    }
    if($foto != NULL){
        mysqli_query($conexion, "UPDATE usuario SET foto = '$foto' WHERE idUsuario = $id");
    }
    if($user != NULL){
        mysqli_query($conexion, "UPDATE usuario SET user = '$user' WHERE idUsuario = $id");
    }

}



function verificarUser($usuario, $pass, $conexion)
{

        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE user = '$usuario'");
        $contar = mysqli_num_rows($consulta);

        if ($contar > 0) {
            $verify = mysqli_fetch_array($consulta);

            if (password_verify($pass, $verify['pass'])) {
                $found = mysqli_query($conexion, "SELECT * FROM usuario WHERE user = '$usuario'");
                return mysqli_num_rows($found);
            } else {
                return 0;
            }
        }

    
}



function verificarUserID($id, $pass, $conexion){
        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE idUsuario = '$id'");
        $contar = mysqli_num_rows($consulta);

        if ($contar > 0) {
            $verify = mysqli_fetch_array($consulta);

            if (password_verify($pass, $verify['contraseña'])) {
                $found = mysqli_query($conexion, "SELECT * FROM usuario WHERE idUsuario = '$id'");
                return mysqli_num_rows($found);
            } else {
                return 0;
            }
        }
    

}



function eliminarUser($id, $conexion){
    return mysqli_query($conexion, "DELETE FROM usuario WHERE idUsuario = $id");
}

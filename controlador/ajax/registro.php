<?php

require_once('../../config/db.php');
require_once('../../modelo/general-model.php');
require_once('../../modelo/users-model.php');



$nombre = $_POST['nombre'];
$user = $_POST['user'];
$correo = $_POST['email'];
$contra = $_POST['contraseña'];
$cContra = $_POST['cContraseña'];


if ($nombre != '' && $user != '' && $correo != '' && $contra != '' && $cContra != '') {
    if ($contra == $cContra) {

        if (existenDatos('usuario', "user = '$user'", $conexion) == 0) {
            if (existenDatos('usuario', "correo = '$correo'", $conexion) == 0) {
                $pass = password_hash($contra, PASSWORD_BCRYPT);
                if (ingresarUser($nombre, $user, $correo, $pass, 'userdefault.png', $conexion)) {
                    $json = array(
                        'msg' => '<div class="alert alert-success">Te has registrado exitosamente</div>',
                    );                     
                } else {
                    $json = array(
                        'msg' => '<div class="alert alert-danger">Ha ocurrido un error al registrarte</div>',
                    );                     
                }
            } else {
                $json = array(
                    'msg' => '<div class="alert alert-danger">Ya existe un usuario con ese correo</div>',
                ); 
            }
        } else {
            $json = array(
                'msg' => '<div class="alert alert-danger">Ya existe un usuario con ese nombre</div>',
            ); 
        }
    } else {
        $json = array(
            'msg' => '<div class="alert alert-danger">Las contraseñas no coinciden</div>',
        ); 
    }
} else {
    $json = array(
        'msg' => '<div class="alert alert-danger">Los campos no pueden estar vacíos</div>',
    ); 
}



$jsonstr = json_encode($json);
echo $jsonstr;







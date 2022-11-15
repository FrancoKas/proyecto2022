<?php

require_once("../../modelo/users-model.php");
require_once('../../config/db.php');
require_once('../../modelo/general-model.php');

if(isset($_SESSION['id'])){
    session_destroy();
}


$user = $_POST['user'];
$contra = $_POST['pass'];

$json = array();


if ($user != '' && $contra != '') {

        if (verificarUser($user, $contra, $conexion) == 1) {

            $sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE user = '$user'");
            while ($data = mysqli_fetch_array($sql)) {
                session_start();
                $_SESSION["id"] = $data['idUsuario'];
                $_SESSION["nombre"] = $data['nomCompleto'];
                $_SESSION["usuario"] = $data['user'];
                $_SESSION["foto"] = $data['foto'];
    
                if (existenDatos('premium', "idUsuario = $data[idUsuario]", $conexion) > 0) {
                    $_SESSION['premium'] = 1;
                    $json = array(
                        'success' => true,
                    );
                }
            }
            $json = array(
                'success' => true,
            );

        } else {
            $json = array(
                'msg' => '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>',
            );

        }

} else {
    $json = array(
        'msg' => '<div class="alert alert-danger">Los campos no pueden estar vacíos</div>',
    );
}

$jsonstr = json_encode($json);
echo $jsonstr;

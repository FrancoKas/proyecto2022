<?php
session_start();

$id = $_SESSION['id'];

require_once('../config/db.php');
require_once('../modelo/users-model.php');


if (isset($_POST['config1'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    if (!empty($_FILES["image"])) {
        $name       = $_FILES['image']['name'];
        $temp_name  = $_FILES['image']['tmp_name'];
        $img_type = $_FILES['image']['type'];

        if (isset($name) and !empty($name)) {

            if (((strpos($img_type, "jpg") || strpos($img_type, "jpeg") || strpos($img_type, "png") || strpos($img_type, "webp")))) {
                $location = '../images/fotos_de_perfil/';
                if (move_uploaded_file($temp_name, $location . $name)) {

                    editarUser($id, $nombre, $correo, NULL, $name, NULL, $conexion);

                    $_SESSION["foto"]= $name;
                    $_SESSION["nombre"]= $nombre;
                    header('location: ../vista/configuracion.html');
                }
            } else {
                header('location: ../vista/configuracion.html?error');
            }
        }
    } else {
        echo 'Debes seleccionar una imagen para subir';
    }
}

if (isset($_POST['config2'])) {

    $actualPass = $_POST['contraActual'];
    $contra = $_POST['contra'];
    $cContra = $_POST['cContra'];
    $id = $_SESSION['id'];

    if ($contra == $cContra) {
        if (verificarUserID($id, $actualPass, $conexion) == 1) {
            $newPass = password_hash($contra, PASSWORD_BCRYPT);
            editarUser($id, NULL, NULL, $newPass, NULL, NULL, $conexion);
            header('location: ../vista/configuracion.html');
        } else {
            header('location: ../vista/configuracion.html?error');
        }
    }
}

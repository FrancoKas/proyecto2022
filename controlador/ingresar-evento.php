<?php

require "../config/db.php";
require "../modelo/general-model.php";

if (isset($_POST['enviar'])) {

    echo 'a';

    $deporte = $_POST['deporte'];
    $evento = $_POST['nomEvento'];



    if (isset($_FILES["imagen"])) {
    echo 'a';


        $condicion = "nomEvento = '$evento'";
        $existe = existenDatos('evento', $condicion, $conexion);

        if ($existe == 0) {
            $foto = $_FILES["imagen"];
            $img = ingresarImagen($foto, 'eventos');

            if (insertarDatos('evento', 'IdDeporte, nomEvento, imagenEvento', "$deporte, '$evento', '$img'", $conexion)) {
                header("location: ../backoffice/ingresar/new-evento.php?env=1");
            } else {
                header("location: ../backoffice/ingresar/new-evento.php?env=0");
            }
        }
    } else {
        header("location: ../backoffice/ingresar/new-evento.php?env=1");
    }
}
?>
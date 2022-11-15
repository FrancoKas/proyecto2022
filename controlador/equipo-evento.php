<?php

require_once "../config/db.php";
require_once "../modelo/general-model.php";

if (isset($_POST['enviar'])) {

    if (isset($_POST['delEvento']) && isset($_POST['delEquipo'])) {

        $evento = $_POST['delEvento'];
        $equipo = $_POST['delEquipo'];

        if(eliminarDatos('participa_en', "IdEvento = $evento and IdEquipo = $equipo", $conexion)){
            header("location: ../backoffice/relaciones/equipo-evento.php?env=1");
        } else {
            header("location: ../backoffice/relaciones/equipo-evento.php?env=0");
        }

        
    } else {

        $evento = $_POST['evento'];
        $tipo = $_POST['tipo'];
        $equipo = $_POST[$tipo];

        if (insertarDatos('participa_en', 'IdEvento, IdEquipo', "$evento, $equipo", $conexion)) {
            $envio = 1;
        } else {
            $envio = 0;
        }
    }



    header("location: ../backoffice/relaciones/equipo-evento.php?env=$envio");
}

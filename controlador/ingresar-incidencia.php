<?php

require_once '../config/db.php';
require_once '../modelo/general-model.php';


if (isset($_POST['enviar'])) {

    $id = $_POST['id'];
    $opcion = $_POST['tipoInc'];
    $minuto = $_POST['minuto'];


    if (insertarDatos('incidencia', 'IdPartido, minuto', "$id, $minuto", $conexion)) {
        $idIncidencia = mostrarDatos('incidencia', 'IdIncidencia', "IdPartido = $id and minuto = $minuto", $conexion);

        if ($opcion == 'cambio') {
            $jug1 = $_POST['jugReemplazo'];
            $jug2 = $_POST['jugReemplazado'];
            if ($jug1 != $jug2) {
                if (insertarDatos('cambio', 'IdIncidencia, jugReemplazo, jugReemplazado', "$idIncidencia[0], $jug1, $jug2", $conexion)) {
                    insertarDatos('sucede', 'IdPartido, IdIncidencia', "$id, $idIncidencia[0]", $conexion);
                    $envio = 1;
                } else {
                    $envio = 0;
                }
            } else {
                $envio = 0;
            }
        } else {
            $jug = $_POST['jugPenalizado'];

            if ($_POST['newPenal'] != '') {
                $penalizacion = $_POST['newPenal'];
            } else {
                $penalizacion = $_POST['selPenal'];
            }

            if (insertarDatos('penalizacion', 'IdIncidencia, IdJugador, nomPenalizacion', "$idIncidencia[0], $jug, '$penalizacion'", $conexion)) {
                insertarDatos('sucede', 'IdPartido, IdIncidencia', "$id, $idIncidencia[0]", $conexion);
                $envio = 1;
            } else {
                $envio = 0;
            }
        }
    } else {
        $envio = 0;
    }

    header("location: ../backoffice/partidos.php?env=$envio");
}

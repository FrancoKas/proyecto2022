<?php

require_once '../config/db.php';
require_once '../modelo/general-model.php';


if (isset($_POST['enviar'])) {
    $partido = $_POST['id'];
    $equipo = $_POST['equipo'];
    $alineacion = $_POST['alineacion'];
    $numJug = $_POST['numJug'];

    if (existenDatos('posee', "IdPartido = $partido and IdEquipo = $equipo", $conexion) == 0) {


        if (insertarDatos('posee', 'IdPartido, IdAlineacion, IdEquipo', "$partido, $alineacion, $equipo", $conexion)) {


            for ($i = 1; $i <= $numJug; $i++) {
                $jug = 'jug' . $i;
                $chk = 'check' . $i;
                $rl = 'roljug' . $i;
                $jugador = $_POST[$jug];
                $rol = $_POST[$rl];


                if (!isset($_POST[$chk])) {

                    if (existenDatos('posicion', "IdJugador = $jugador and rol = '$rol'", $conexion) == 0) {

                        if (insertarDatos('posicion', 'IdJugador, rol', "$jugador, '$rol'", $conexion)) {
                            $pos = mostrarDatos('posicion', 'IdPosicion', "IdJugador = $jugador and rol = '$rol'", $conexion);
                            $idpos = $pos[0];

                            if (insertarDatos('tiene_una', "IdPosicion, IdAlineacion", "$idpos, $alineacion", $conexion)) {
                                $envio = 1;
                            } else {
                                $envio = 0;
                            }
                        } else {
                            $envio = 0;
                        }
                    } else {
                        $pos = mostrarDatos('posicion', 'IdPosicion', "IdJugador = $jugador and rol = '$rol'", $conexion);
                        $idpos = $pos[0];

                        if (insertarDatos('tiene_una', "IdPosicion, IdAlineacion", "$idpos, $alineacion", $conexion)) {
                            $envio = 1;
                        } else {
                            $envio = 0;
                        }
                    }
                }
            }
        }
    } else {
        $envio = 0;
    }


    header("location: ../backoffice/partidos.php?env=$envio");
}

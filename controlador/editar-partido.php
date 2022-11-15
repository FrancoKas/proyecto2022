<?php

require_once '../config/db.php';
require_once '../modelo/general-model.php';
require_once '../modelo/mail-model.php';

if (isset($_POST['enviar'])) {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (isset($_POST['edit'])) {
        $editOpc = $_POST['edit'];
        if ($editOpc == 'even') {
            $evento = $_POST['evento'];
            if (existenDatos('participa', "IdPartido = $id", $conexion) == 0) {

                if (insertarDatos('participa', 'IdEvento, IdPartido', "$evento, $id", $conexion)) {
                    $consul = mysqli_query($conexion, "SELECT nomEvento FROM evento WHERE evento.IdEvento = $evento");
                    $arrEvento = mysqli_fetch_array($consul);
                    $nomEvento = $arrEvento['nomEvento'];
                    $consulta = mysqli_query($conexion, "SELECT correo FROM usuario, notificacion_de WHERE notificacion_de.IdEvento = $evento");
                    if (mysqli_num_rows($consulta) > 0) {
                        while ($usuarios = mysqli_fetch_array($consulta)) {
                            $correo = $usuarios['correo'];
                            enviarMail($correo, "NUEVO PARTIDO AÑADIDO", "SE HA AÑADIDO UN NUEVO PARTIDO AL EVENTO $nomEvento");
                        }
                    }

                    $envio = 1;
                } else {
                    $envio = 0;
                }
            } else {
                $envio = 0;
            }
        } else if ($editOpc == 'noeven') {

            if (existenDatos('participa', "IdPartido = $id", $conexion) == 1) {
                $consul = mysqli_query($conexion, "SELECT nomEvento FROM participa WHERE participa.IdPartido = $id");
                if (eliminarDatos('participa', "IdPartido = $id", $conexion)) {
                    $arrEvento = mysqli_fetch_array($consul);
                    $nomEvento = $arrEvento['nomEvento'];
                    $consulta = mysqli_query($conexion, "SELECT correo FROM usuario, notificacion_de WHERE notificacion_de.IdEvento = $evento");
                    if (mysqli_num_rows($consulta) > 0) {
                        while ($usuarios = mysqli_fetch_array($consulta)) {
                            $correo = $usuarios['correo'];
                            enviarMail($correo, "PARTIDO ELIMINADO", "SE HA ELIMINADO UN PARTIDO DEL EVENTO $nomEvento");
                        }
                    }
                    $envio = 1;
                } else {
                    $envio = 0;
                }
            } else {
                $envio = 0;
            }
        } else if ($editOpc == 'alin') {
            header("location: ../backoffice/relaciones/partido-alineacion.php?id=$id");
        }
    }

    if (isset($_REQUEST['opc'])) {
        $opc = $_REQUEST['opc'];
        if ($opc == 'res') {

            $i = $_POST['numEquipos'];
            for ($x = 1; $x <= $i; $x++) {
                $equipo = 'equipo' . $x;
                $jug = 'jugador' . $x;
                $anot = 'anotacion' . $x;
                $idEquipo = $_POST[$equipo];

                if ($_POST[$jug] > 0) {
                    $jugador = $_POST[$jug];
                    $anotacion = $_POST[$anot];
                }


                if ($_POST['tipoPunt'] == 'Puntos') {

                    $punt = "puntEquipo" . $x;
                    echo $punt;

                    if (existenDatos('resultado', "IdEquipo = $idEquipo and IdPartido = $id", $conexion) == 0) {

                        if ($_POST[$punt] >= 0) {
                            $puntuacion = $_POST[$punt];
                            insertarDatos('resultado', 'IdEquipo, puntuacion, IdPartido', "$idEquipo, $puntuacion, $id", $conexion);

                            $eqNom = mostrarDatos('equipo, compite, partido', 'equipo.nomEquipo', "partido.IdPartido = $id and equipo.IdEquipo = compite.IdEquipo and compite.IdPartido = partido.IdPartido", $conexion);
                            $contar = 0;

                            while ($datos = $eqNom) {
                                $contar++;
                                if ($contar == 1) {
                                    $eq1 = $datos['nomEquipo'];
                                    echo $eq1;
                                } else {
                                    $eq2 = $datos['nomEquipo'];

                                }
                            }

                            $metioEqq = mostrarDatos('equipo', 'nomEquipo', "equipo.IdEquipo = $idEquipo", $conexion);
                            $nomMetio = $metioEqq['nomEquipo'];

                            $consultaa = mysqli_query($conexion, "SELECT correo FROM usuario, notificacion_de WHERE notificacion.IdPartido = $id");
                            if (mysqli_num_rows($consultaa) > 0) {
                                while ($usuarios = mysqli_fetch_array($consultaa)) {
                                    $correo = $usuarios['correo'];
                                    enviarMail($correo, "$nomMetio HA ANOTADO!", "$nomMetio HA REALIZADO UNA ANOTACION ANTE EL PARTIDO DE $eq1 VS $eq2");
                                }
                            }


                            $idRes = mostrarDatos('resultado', 'IdResultado', "IdPartido = $id and IdEquipo = $idEquipo", $conexion);
                            $res = $idRes['IdResultado'];
                            echo $res;
                            insertarDatos('tiene_un', 'IdResultado, IdPartido', "$res, $id", $conexion);
                            editarDatos('partido', "IdResultado = $res", "IdPartido = $id", $conexion);

                            if (isset($jugador)) {
                                $sqlAnota = mysqli_query($conexion, "SELECT * FROM anota WHERE IdPartido = $id and IdJugador = $jugador");

                                if (mysqli_num_rows($sqlAnota) == 0) {
                                    $actualizarAnota = mysqli_query($conexion, "INSERT INTO anota(IdPartido, IdJugador, anotacion) VALUES($id, $jugador, $anotacion");
                                } else {
                                    $dataAnota = mysqli_fetch_array($sqlAnota);
                                    $anotaciones = $dataAnota['anotacion'];

                                    $sumaAnota = $anotacion + $anotaciones;
                                    $actualizarAnota = mysqli_query($conexion, "UPDATE anota SET anotacion = $sumaAnota WHERE IdJugador = $jugador and IdPartido = $id");
                                }
                            }

                            $envio = 1;
                        }
                    } else {

                        $puntuacion = $_POST[$punt];

                        if ($puntuacion >= 0) {
                            if (isset($jugador)) {
                                $sqlAnota = mysqli_query($conexion, "SELECT * FROM anota WHERE IdPartido = $id and IdJugador = $jugador");

                                if (mysqli_num_rows($sqlAnota) == 0) {

                                    $actualizarAnota = mysqli_query($conexion, "INSERT INTO anota(IdPartido, IdJugador, anotacion) VALUES($id, $jugador, $anotacion)");
                                } else {
                                    $dataAnota = mysqli_fetch_array($sqlAnota);
                                    $anotaciones = $dataAnota['anotacion'];

                                    $sumaAnota = $anotacion + $anotaciones;
                                    $actualizarAnota = mysqli_query($conexion, "UPDATE anota SET anotacion = $sumaAnota WHERE IdJugador = $jugador and IdPartido = $id");
                                }
                            }

                            $eqNom = mostrarDatos('equipo, compite, partido', 'equipo.nomEquipo', "partido.IdPartido = $id and equipo.IdEquipo = compite.IdEquipo and compite.IdPartido = partido.IdPartido", $conexion);
                            $contar = 0;

                            while ($datos = $eqNom) {
                                $contar++;
                                if ($contar == 1) {
                                    $eq1 = $datos['nomEquipo'];
                                    echo $eq1;
                                } else {
                                    $eq2 = $datos['nomEquipo'];

                                }
                            }

                            $metioEqq = mostrarDatos('equipo', 'nomEquipo', "equipo.IdEquipo = $idEquipo", $conexion);
                            $nomMetio = $metioEqq['nomEquipo'];

                            $consultaa = mysqli_query($conexion, "SELECT correo FROM usuario, notificacion_de WHERE notificacion.IdPartido = $id");
                            if (mysqli_num_rows($consultaa) > 0) {
                                while ($usuarios = mysqli_fetch_array($consultaa)) {
                                    $correo = $usuarios['correo'];
                                    enviarMail($correo, "$nomMetio HA ANOTADO!", "$nomMetio HA REALIZADO UNA ANOTACION ANTE EL PARTIDO DE $eq1 VS $eq2");
                                }
                            }
                            editarDatos('resultado', "puntuacion = $puntuacion", "IdEquipo = $idEquipo and IdPartido = $id", $conexion);
                            $envio = 1;
                        } else {
                            $envio = 0;
                        }
                    }
                } else {
                    $pos = "posEquipo" . $x;

                    if (existenDatos('resultado', "IdEquipo = $idEquipo and IdPartido = $id", $conexion) == 0) {

                        if (isset($_POST[$pos])) {
                            $posicion = $_POST[$pos];
                            insertarDatos('resultado', 'IdEquipo, posicion, IdPartido', "$idEquipo, $posicion, $id", $conexion);
                            $idRes = mostrarDatos('resultado', 'IdResultado', "IdPartido = $id and IdEquipo = $idEquipo", $conexion);
                            $res = $idRes['IdResultado'];
                            insertarDatos('tiene_un', 'IdResultado, IdPartido', "$res, $id", $conexion);
                            editarDatos('partido', "IdResultado = $res", "IdPartido = $id", $conexion);
                            $envio = 1;
                        } else {
                            $envio = 0;
                        }
                    } else {

                        $posicion = $_POST[$pos];

                        if (isset($posicion)) {

                            editarDatos('resultado', "posicion = $posicion", "IdEquipo = $idEquipo and IdPartido = $id", $conexion);
                            $envio = 1;
                        } else {
                            $envio = 0;
                        }
                    }
                }
            }
        }
    }

    if (isset($_POST['eliminar'])) {
        if (eliminarDatos('partido', "IdPartido = $id", $conexion)) {
            $envio = 1;
        } else {
            $envio = 0;
        }
    }

    if (isset($_POST['estado'])) {
        $estado = $_POST['estado'];
        if (editarDatos('partido', "estado = '$estado'", "IdPartido = $id", $conexion)) {
            $envio = 1;
        } else {
            $envio = 0;
        }
    }

    if (!empty($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
        if (editarDatos('partido', "fecha = '$fecha'", "IdPartido = $id", $conexion)) {
            $envio = 1;
        } else {
            $envio = 0;
        }
    }

    if (isset($_POST['eliminarEq'])) {
        $equipo = $_POST['eliminarEq'];
        if (eliminarDatos('compite', "IdPartido = $id and IdEquipo = $equipo", $conexion)) {
            $envio = 1;
        } else {
            $envio = 0;
        }
    }


    if ($_POST['editar'] == 'si') {
        header("location: ../backoffice/relaciones/equipos-partido.php?id=$id");
    } else {
        header("location: ../backoffice/partidos.php?env=$envio");
    }
}

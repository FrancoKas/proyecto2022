<?php

require_once "../../config/db.php";


$sql = mysqli_query($conexion, "SELECT * FROM partido, arbitro WHERE partido.IdArbitro = arbitro.IdArbitro order by rand()");
$x = 0;
$json = array();


while ($data = mysqli_fetch_array($sql)) {
    $jugse1 = array();
    $jugse2 = array();
    $infre1 = array();
    $infre2 = array();
    $i = 0;
    $x++;
    $arbitro = $data['nomArb'] . ' ' . $data['apeArb'];

    $sql2 = mysqli_query($conexion, "SELECT equipo.nomEquipo, equipo.Imagen, resultado.puntuacion, equipo.IdEquipo FROM compite, equipo, resultado, tiene_un WHERE compite.IdPartido = $data[IdPartido] and tiene_un.IdResultado = resultado.IdResultado and resultado.IdEquipo = equipo.IdEquipo and tiene_un.IdPartido = $data[IdPartido] LIMIT 2");

    while ($data2 = mysqli_fetch_array($sql2)) {
        $i++;

        $idmodal = 'modal' . $x;

        $cJug = mysqli_query($conexion, "SELECT jugador.nomJug, jugador.apeJug, posicion.rol FROM jugador, posicion, tiene, compite WHERE jugador.IdJugador = posicion.IdJugador and compite.IdPartido = $data[IdPartido] and tiene.IdJugador = jugador.IdJugador and tiene.IdEquipo = compite.IdEquipo and compite.IdEquipo = $data2[IdEquipo] GROUP BY nomJug;");
        $alin = mysqli_query($conexion, "SELECT incidencia.minuto, penalizacion.nomPenalizacion, jugador.nomJug, jugador.apeJug FROM jugador, incidencia, penalizacion, compite, tiene  WHERE incidencia.IdPartido = $data[IdPartido] and compite.IdEquipo = $data2[IdEquipo] and incidencia.IdPartido = compite.IdPartido and compite.IdEquipo = tiene.IdEquipo and tiene.IdJugador = jugador.IdJugador and penalizacion.IdJugador = jugador.IdJugador and penalizacion.IdIncidencia = incidencia.IdIncidencia");

        if ($i == 1) {
            $eq1 = $data2['nomEquipo'];
            $ideq1 = $data2['IdEquipo'];
            $imge1 = $data2['Imagen'];
            $rese1 = $data2['puntuacion'];
            while($lala = mysqli_fetch_array($cJug)){
                array_push($jugse1, $lala);
            }
            while($lala3 = mysqli_fetch_array($alin)){
                array_push($infre1, $lala3);
            }

        } else {

             $arr = array(
                'equipo1' => $eq1,
                    'imgequipo1' => $imge1,
                    'rese1' => $rese1,
                    'arbitro' => $arbitro,
                    'equipo2' => $data2['nomEquipo'],
                    'imgequipo2' => $data2['Imagen'],
                    'idpartido' => $data['IdPartido'],
                    'rese2' => $data2['puntuacion'],
                    'estado' => $data['estado'],
                    'fecha' => $data['fecha'],
                    'idequipo2' => $data2['IdEquipo'],
                    'idequipo1' => $ideq1,
                    'modal' => $idmodal
            );
            while($lala2 = mysqli_fetch_array($cJug)){
                array_push($jugse2, $lala2);
            }

            while($lala4 = mysqli_fetch_array($alin)){
                array_push($infre2, $lala4);
            }
            

            array_push($arr, $jugse1);
            array_push($arr, $jugse2);
            array_push($arr, $infre1);
            array_push($arr, $infre2);
            array_push($json, $arr);
            
        }

        

    
        
    }
    
}

$jsonstr = json_encode($json);
echo $jsonstr;



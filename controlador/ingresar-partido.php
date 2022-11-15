<?php

require "../config/db.php";
require "../modelo/general-model.php";

if (isset($_POST['enviar'])) {

    $deporte = $_POST['deporte'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $arbitro = $_POST['arbitro'];
    $opcion = $_POST['opcion'];
    $equipos = $_POST['equipos'];
    $condicion = "IdDeporte = $deporte and IdArbitro = $arbitro";

    $existe = existenDatos('arbitro', $condicion, $conexion);

    if ($existe > 0) {
        
        
        if(insertarDatos('partido', 'IdDeporte, fecha, IdArbitro, ubicacion, estado', "$deporte, '$fecha', $arbitro, '$lugar', 'Programado'", $conexion)){

            $partido = mostrarDatos('partido', 'IdPartido', "IdDeporte = $deporte and fecha = '$fecha' and IdArbitro = $arbitro and ubicacion = '$lugar'", $conexion);
            $id = $partido['IdPartido'];

                if($_POST['evento-p'] > 0){
                    $evento = $_POST['evento-p'];
                    if(insertarDatos('participa', 'IdEvento, IdPartido', "$evento, $id", $conexion)){
                        $envio = 1;
                    } else {
                        $envio = 0;
                    }
                }

                for($i = 0; $i < $equipos; $i++){

                    $name = 'equipo' . $i;
                    $idEquipo = $_POST[$name];

                    if(insertarDatos('compite', 'IdPartido, IdEquipo', "$id, $idEquipo", $conexion)){
                        $sql = mysqli_query($conexion, "SELECT tipoPuntuacion from deporte WHERE IdDeporte = $deporte");
                        $punt = mysqli_fetch_array($sql);
                        if($punt['tipoPuntuacion'] == 'Puntos'){
                            insertarDatos('resultado', 'IdEquipo, IdPartido, puntuacion', "$idEquipo, $id, 0", $conexion);
                            $dato = mostrarDatos('resultado', 'IdResultado', "IdPartido = $id and IdEquipo = $idEquipo", $conexion);
                            insertarDatos('tiene_un', 'IdPartido, IdResultado', "$id, $dato[IdResultado]", $conexion);
                            $envio = 1;
                        } else {
                            $envio = 1;
                        }
                    } else {
                        $envio = 0;
                    }
                }
                
        } else {
            $envio = 0;

        }
    } else {
        $envio = 0;

    }


    ?> 
    <script> window.location = "../backoffice/ingresar/new-partido.php?env=<?php echo $envio; ?>"; </script>;
    <?php

}

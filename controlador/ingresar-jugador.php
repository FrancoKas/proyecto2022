<?php

require_once "../config/db.php";
require "../modelo/general-model.php";
require "../modelo/jugador-model.php";

if (isset($_POST['enviar'])) {

    $nombre = $_POST['nJugador'];
    $apellido = $_POST['aJugador'];
    $edad = $_POST['eJugador'];
    $pais = $_POST['pJugador'];

    $existe = existenDatos('jugador', "nomJug = '$nombre' and apeJug = '$apellido' and edad = '$edad' and nacionalidad = '$pais' ", $conexion);

    if($existe == 0){
        ingresarJugador($nombre, $apellido, $edad, $pais, $conexion);
        $envio = 1;
    } else{
        $envio = 0;
    }
    ?> 
    <script> window.location = "../backoffice/ingresar/new-jugador.php?env=<?php echo $envio; ?>"; </script>;
    <?php
    }

    
            
    
                
            
        


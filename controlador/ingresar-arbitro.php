<?php

require_once "../config/db.php";
require "../modelo/general-model.php";
require "../modelo/arbitro-model.php";

if (isset($_POST['enviar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $deporte = $_POST['deporte'];

    $existe = existenDatos('arbitro', "nomArb = '$nombre' and apeArb = '$apellido' and IdDeporte = '$deporte'", $conexion);

    if($existe == 0){
        ingresarArbitro($nombre, $apellido, $deporte, $conexion);
        $envio = 1;
    } else{
        $envio = 0;
    }
    ?> 
    <script> window.location = "../backoffice/ingresar/new-arbitro.php?env=<?php echo $envio; ?>"; </script>;
    <?php
    }

    
            
    
                
            
        


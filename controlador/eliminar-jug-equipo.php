<?php

    require_once '../config/db.php';
    require '../modelo/general-model.php';

    if(isset($_POST['enviar'])){
        $jug = $_POST['id'];
        $equipo = $_POST['equipo'];

        if(eliminarDatos('tiene', "IdJugador = $jug and IdEquipo = $equipo", $conexion)){
            $envio = 1;
        } else {
            $envio = 0;
        }

    }

    ?>
        <script>
            window.location = "../backoffice/relaciones/jug-equipo-1.php?env=<?php echo $envio; ?>";
        </script>

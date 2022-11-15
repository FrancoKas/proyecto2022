<?php

require "../config/db.php";
require "../modelo/general-model.php";
require '../modelo/equipo-model.php';

if (isset($_POST['enviar'])) {


    $nombre = $_POST['nEquipo'];
    $pais = $_POST['pEquipo'];
    $tipo = $_POST['opc'];

    if (!empty($_FILES["img"])) {

        $foto = $_FILES["img"];
        $condicion = "nomEquipo = '$nombre' ";
        $existe = existenDatos('equipo', $condicion, $conexion);

        if ($existe == 0) {
            $img = ingresarImagen($foto, 'equipos');
            ingresarEquipo($nombre, $pais, $img, $conexion);
            $data = mostrarDatos('equipo', 'IdEquipo', "nomEquipo = '$nombre' and paisEquipo = '$pais'", $conexion);
            
            switch($tipo){
                case 'persona':
                    insertarDatos('persona', 'IdEquipo', $data['IdEquipo'], $conexion);
                    break;
                
                case 'seleccion':
                    insertarDatos('seleccion', 'IdEquipo', $data['IdEquipo'], $conexion);
                    break;
                
                case 'club':
                    insertarDatos('club', 'IdEquipo', $data['IdEquipo'], $conexion);
                    break;
            } 

            $envio = 1;
        }
    } else {
        $envio = 0;
    }
}


?>

    <script>
        window.location = "../backoffice/ingresar/new-equipo.php?env=<?php echo $envio; ?>";
    </script>


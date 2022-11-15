<?php

require "../config/db.php";
require "../modelo/deporte-model.php";
require "../modelo/general-model.php";

if (isset($_POST['enviar'])) {

    $nombre = $_POST['nDeporte'];
    $opcion = $_POST['opc'];
    $puntuacion = $_POST['punt'];
    $condicion = "nomDeporte = '$nombre' ";

    $existe = existenDatos('deporte', $condicion, $conexion);

    if ($existe == 0) {

        if (ingresarDeporte($nombre, $puntuacion, $conexion)) {
            $x = mostrarDeporte('IdDeporte', $condicion, $conexion);
        } else {
            header("location: ../backoffice/ingresar/new-deporte.php?env=0");
        }

        if ($opcion == 'individual') {
            if (insertarDatos('depindividual', 'IdDeporte', $x, $conexion)) {
                $envio = 1;
            } else {
                $envio = 0;
            }
        } else if ($opcion == 'colectivo') {
            if (insertarDatos('depcolectivo', 'IdDeporte', $x, $conexion)) {
                $envio = 1;
            } else {
                header("location: ../backoffice/ingresar/new-deporte.php?env=0");
            }
        }
    } else {
        header("location: ../backoffice/ingresar/new-deporte.php?env=0");
    }

?>

    <script>
        window.location = "../backoffice/ingresar/new-deporte.php?env=<?php echo $envio; ?>";
    </script>

<?php

}

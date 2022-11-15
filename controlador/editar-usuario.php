<?php

require_once '../config/db.php';
require_once '../modelo/users-model.php';
require_once '../modelo/general-model.php';

if (isset($_POST['enviar'])) {
    $id = $_REQUEST['id'];
    $nombre = $_POST['nombre'];
    $user = $_POST['user'];
    $correo = $_POST['correo'];
    $premium = $_POST['premium'];
    $fechafin = $_POST['fechafin'];

    if (isset($nombre)) {
        editarUser($id, $nombre, NULL, NULL, NULL, NULL, $conexion);
        $envio = 1;
    }

    if (isset($user)) {
        editarUser($id, NULL, NULL, NULL, NULL, $user, $conexion);
        $envio = 1;
    }

    if (isset($correo)) {
        editarUser($id, NULL, $correo, NULL, NULL, NULL, $conexion);
        $envio = 1;
    }

    if (isset($premium)) {
        $cuenta = existenDatos('premium', "IdUsuario = $id", $conexion);

        switch ($premium) {
            case 1:
                if ($cuenta == 0) {
                    insertarDatos('premium', 'IdUsuario', $id, $conexion);
                    insertarDatos('adquiere', 'IdUsuario, fechaFin', "$id, '$fechafin'", $conexion);
                    $envio = 1;
                }
                break;
            case 0;
                if ($cuenta > 0) {
                    eliminarDatos('premium', "IdUsuario = $id", $conexion);
                    $envio = 1;
                }
                break;
        }
    }

}

?>
        <script>
            window.location = "../backoffice/adminUsuarios.php?env=<?php echo $envio; ?>";
        </script>


<?php

if (!empty($_REQUEST['id'])) {
    require_once "../config/db.php";
    require_once "../modelo/general-model.php";

    $id = $_REQUEST['id'];

    eliminarDatos('publicidad', "IdPublicidad = $id", $conexion);

    $envio = 2;

}
?>
    <script>
        window.location = "../backoffice/adminPublicidades.php?env=<?php echo $envio; ?>";
    </script>
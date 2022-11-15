<?php

require "../html/conexion.php";

if (isset($_POST['enviar'])) {

    $evento = $_POST['evento'];

    if (isset($_POST['chkDeporte']) || isset($_POST['chkNombre']) || isset($_POST['chkEquipo']) || isset($_POST['chkPartido'])) {


        if (isset($_POST['chkDeporte'])) {
            $deporte = $_POST['deporte'];
            $queryDepo = mysqli_query($conexion, "UPDATE evento SET deporte = '$deporte' WHERE idEvento = '$evento'");
            $envio_correcto = 1;
        }

        if (isset($_POST['chkNombre'])) {
            $nombre = $_POST['nomEvento'];
            $queryNom = mysqli_query($conexion, "UPDATE evento SET nomEvento = '$nombre' WHERE idEvento = '$evento'");
            $envio_correcto = 1;
        }

    } else if (isset($_POST['eliminar'])) {
        $eliminar = mysqli_query($conexion, "DELETE FROM evento WHERE idEvento = '$evento'");
        $eliminar2 = mysqli_query($conexion, "DELETE FROM partidos_eventos WHERE idEvento = '$evento'");
        $eliminar3 = mysqli_query($conexion, "DELETE FROM equipos_evento WHERE idEvento = '$evento'");
        $envio_correcto = 2;
    } else {
        $envio_correcto = 0;
    }


?>
    <script>
        window.location = "../html/eEvento.php?env=<?php echo $envio_correcto; ?>";
    </script>
<?php


}





?>
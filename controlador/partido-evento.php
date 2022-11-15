<?php

require "../html/conexion.php";

if (isset($_POST['enviar'])) {

    $evento = $_POST['evento'];
    $partido = $_POST['partido'];



    if ($evento > 0 && $partido > 0) {

        $sql = "INSERT INTO partidos_eventos (idEvento, idPartido) 
            VALUES ('" . $evento . "', '" . $partido . "')";
        $sql2 = mysqli_query($conexion, "SELECT * FROM evento WHERE idEvento = '$evento'");
        $sql3 = mysqli_query($conexion, "SELECT * FROM partido WHERE partido_id = '$partido'");
        $lineas = mysqli_fetch_row($sql2);
        $lineas2 = mysqli_fetch_row($sql3);
        $depEven = $lineas[2];
        $depPartido = $lineas2[1];

        echo $depEven;
        echo $depPartido;

        if ($depEven == $depPartido) {
            $result = mysqli_query($conexion, $sql);

            if ($result) {
                $envio_correcto = 1;
?>
                <script>
                    window.location = "../html/partidotoEvento.php?env=<?php echo $envio_correcto; ?>";
                </script>
            <?php
            } else {
                $envio_correcto = 3;
            ?>
                <script>
                    window.location = "../html/partidotoEvento.php?env=<?php echo $envio_correcto; ?>";
                </script>
<?php
            }
        } else{
            $envio_correcto = 2;
            ?>
                <script>
                    window.location = "../html/partidotoEvento.php?env=<?php echo $envio_correcto; ?>";
                </script>
<?php
        }
    }
}

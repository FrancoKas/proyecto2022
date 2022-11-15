<?php
require "../config/db.php";
require "../modelo/general-model.php";

if (isset($_POST['enviar'])) {

    if (!empty($_FILES['iPubli'])) {
        $foto = $_FILES['iPubli'];
        $deporte = $_POST['deporte'];
        $link = $_POST['linkPubli'];
        $nombre = $_POST['nPubli'];

        $tmp_name = $foto['tmp_name'];
        $directorio_destino = "../images/publicidades/";
        $img_file = $foto['name'];
        $img_type = $foto['type'];


        if (((strpos($img_type, "jpg") || strpos($img_type, "jpeg") || strpos($img_type, "png") || strpos($img_type, "webp")))) {

                if (move_uploaded_file($tmp_name, $directorio_destino . $img_file)) {

                    if ($deporte > 0) {
                        insertarDatos('publicidad', 'IdDeporte, nomPublicidad, link, imagen', "$deporte, '$nombre', '$link', '$img_file'", $conexion);
                        $envio = 1;
                    } else {
                        insertarDatos('publicidad', 'nomPublicidad, link, imagen', "'$nombre', '$link', '$img_file'", $conexion);
                        $envio = 1;
                    }
        ?>
                    <script>
                        window.location = "../backoffice/ingresar/new-publicidad.php?env=<?php echo $envio; ?>";
                    </script>
        <?php
                        $envio = 0;
                }
            } else {

                $envio = 0;

        ?>
                    <script>
                        window.location = "../backoffice/ingresar/new-publicidad.php?env=<?php echo $envio; ?>";
                    </script>
        <?php
                }
            }
        }


?>
<?php

    require_once '../../config/db.php';

    session_start();

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];


        $esPrem = mysqli_query($conexion, "SELECT * FROM premium WHERE IdUsuario = $id");

        if(mysqli_num_rows($esPrem) > 0){
            $partido = $_POST['partido'];

            $sql = mysqli_query($conexion, "SELECT * FROM notificacion WHERE IdUsuario = $id and IdPartido = $partido");
            $estasus = mysqli_num_rows($sql);

                if($estasus == 0) {
                    if(mysqli_query($conexion, "INSERT INTO notificacion(IdUsuario, IdPartido) VALUES ($id, $partido)")){

                        echo "<div class='alert alert-success w-75 m-auto mb-3 mt-3'>¡Te has suscrito al partido!</div>";
                    } else {
                            echo "<div class='alert alert-danger w-75 m-auto mb-3 mt-3'>¡No te has podido suscribir $id a $partido</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger w-75 m-auto mb-3 mt-3'>¡Ya estas suscrito a ese partido</div>";
                }

        } else {
        echo "<div class='alert alert-danger w-75 m-auto mb-3 mt-3'>¡No eres premium!</div>";
        }
        
        
    } else {
        echo "<div class='alert alert-danger w-75 m-auto mb-3 mt-3'>¡Debes iniciar sesión para hacer eso!</div>";
    }

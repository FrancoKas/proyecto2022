<?php

    require_once '../../config/db.php';

    session_start();

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];


        $esPrem = mysqli_query($conexion, "SELECT * FROM premium WHERE IdUsuario = $id");

        if(mysqli_num_rows($esPrem) > 0){
            $evento = $_POST['evento'];

            $sql = mysqli_query($conexion, "SELECT * FROM notificacion_de WHERE IdUsuario = $id and IdEvento = $evento");
            $estasus = mysqli_num_rows($sql);

                if($estasus == 0) {
                    if(mysqli_query($conexion, "INSERT INTO notificacion_de(IdUsuario, IdEvento) VALUES ($id, $evento)")){

                        $evento = mysqli_query($conexion, "SELECT nomEvento FROM evento WHERE IdEvento = $evento");
                        $idarr = mysqli_fetch_array($evento);
                        $nomEvento = $idarr['nomEvento'];
                        echo "<div class='alert alert-success w-25 m-auto mb-3'>Te has suscrito al evento $nomEvento</div>";
                    } else {
                            echo "<div class='alert alert-danger w-25 m-auto mb-3'>No te has podido suscribir</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger w-25 m-auto mb-3'>Ya estas suscrito a ese evento</div>";
                }

        } else {
        echo "<div class='alert alert-danger w-25 m-auto mb-3'>No eres premium!</div>";
        }
        
        
    } else {
        echo "<div class='alert alert-danger w-25 m-auto mb-3'>Debes iniciar sesión para hacer eso</div>";
    }

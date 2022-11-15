<?php
    require_once '../../config/db.php';


    session_start();

    if(isset($_SESSION['id'])){

        if(!isset($_SESSION['premium'])){
            $susc = $_POST['susc'];
            $id = $_SESSION['id'];

            if($susc == 'plata'){
                $suscr = mysqli_query($conexion, 'SELECT IdSuscripcion FROM suscripcion WHERE nomSuscripcion = "Plata"');
                $arrSusc = mysqli_fetch_array($suscr);
                $idsusc = $arrSusc['IdSuscripcion'];
                $fechaActual = date('y-m-d');
                $fechaFin = date("y-m-d",strtotime($fechaActual."+ 1 week")); 
                $insertPlata = mysqli_query($conexion, "INSERT INTO premium(IdUsuario) VALUES ($id)");
                $insertPlataA = mysqli_query($conexion, "INSERT INTO adquiere(IdUsuario, fechaInicio, fechaFin, IdSuscripcion) VALUES ($id, '$fechaActual', '$fechaFin', $idsusc)");

                $_SESSION['premium'] = 1;

                $json = array(
                    'msg' => '<div class="alert alert-success">¡Enhorabuena! Ahora eres premium</div>',
                );    
                
            } else if($susc == 'platino'){
                $suscr = mysqli_query($conexion, 'SELECT IdSuscripcion FROM suscripcion WHERE nomSuscripcion = "Platino"');
                $arrSusc = mysqli_fetch_array($suscr);
                $idsusc = $arrSusc['IdSuscripcion'];
                $fechaActual = date('y-m-d');
                $fechaFin = date("y-m-d",strtotime($fechaActual."+ 1 month")); 
                $insertPlata = mysqli_query($conexion, "INSERT INTO premium(IdUsuario) VALUES ($id)");
                $insertPlataA = mysqli_query($conexion, "INSERT INTO adquiere(IdUsuario, fechaInicio, fechaFin, IdSuscripcion) VALUES ($id, '$fechaActual', '$fechaFin', $idsusc)");
                
                $_SESSION['premium'] = 1;
                
                $json = array(
                    'msg' => '<div class="alert alert-success">¡Enhorabuena! Ahora eres premium</div>',
                );    
            } else if($susc == 'diamante'){
                $suscr = mysqli_query($conexion, 'SELECT IdSuscripcion FROM suscripcion WHERE nomSuscripcion = "Diamante"');
                $arrSusc = mysqli_fetch_array($suscr);
                $idsusc = $arrSusc['IdSuscripcion'];
                $fechaActual = date('y-m-d');
                $fechaFin = date("y-m-d",strtotime($fechaActual."+ 1 year")); 
                $insertPlata = mysqli_query($conexion, "INSERT INTO premium(IdUsuario) VALUES ($id)");
                $insertPlataA = mysqli_query($conexion, "INSERT INTO adquiere(IdUsuario, fechaInicio, fechaFin, IdSuscripcion) VALUES ($id, '$fechaActual', '$fechaFin', $idsusc)");
                
                $_SESSION['premium'] = 1;
                
                $json = array(
                    'msg' => '<div class="alert alert-success">¡Enhorabuena! Ahora eres premium</div>',
                );    
            }


        } else {
            
            $json = array(
                'msg' => '<div class="alert alert-danger">¡Ya eres premium!</div>',
            );    
        }



    } else {
        
        $json = array(
            'msg' => '<div class="alert alert-danger">¡Debes iniciar sesión para hacer eso!</div>',
        );   
    }

    $jsonstr = json_encode($json);
    echo $jsonstr;

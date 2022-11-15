<?php

require_once "../../config/db.php";
session_start();


if(isset($_SESSION['id'])){
    $sql = mysqli_query($conexion, "SELECT link, nomPublicidad, imagen from publicidad order by rand() limit 1");

    $json = array();
    $id = $_SESSION['id'];
    $premium = mysqli_query($conexion, "SELECT IdUsuario from premium WHERE IdUsuario = $id");

    if(mysqli_num_rows($premium) == 0){

        while($pub = mysqli_fetch_array($sql)){
            $json[] = array(
                'nombre' => $pub['nomPublicidad'],
                'link' => $pub['link'],
                'imagen' => $pub['imagen'],
            );
        }
        
    } 
} else {

    $sql = mysqli_query($conexion, "SELECT link, nomPublicidad, imagen from publicidad order by rand() limit 1");
    $json = array();

        while($pub = mysqli_fetch_array($sql)){
            $json[] = array(
                'nombre' => $pub['nomPublicidad'],
                'link' => $pub['link'],
                'imagen' => $pub['imagen'],
            );
        }
        
    
}

$jsonstr = json_encode($json);
echo $jsonstr;



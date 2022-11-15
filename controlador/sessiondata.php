<?php
require_once ('../config/db.php');

$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE user = '$user'");
        while($data = mysqli_fetch_array($sql)){
                $_SESSION["id"]=$data['idUsuario'];
                $_SESSION["nombre"]=$data['nomCompleto'];
                $_SESSION["usuario"]=$data['user'];
                $_SESSION["foto"]=$data['foto'];
        }
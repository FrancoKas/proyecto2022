<?php
    $conexion = new mysqli("localhost", "root", "" ,"sweetproject");

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }



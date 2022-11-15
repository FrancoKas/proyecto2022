<?php

    require_once '../config/db.php';
    require_once '../modelo/general-model.php';

    $id = 14;
    $eqNom = mostrarDatos('equipo, compite, partido', 'equipo.nomEquipo', "partido.IdPartido = $id and equipo.IdEquipo = compite.IdEquipo and compite.IdPartido = partido.IdPartido", $conexion);

    echo $eqNom[0];
    echo $eqNom[1];
?>
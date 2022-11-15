<?php

if (empty($_REQUEST['id'])) {
	header("location: ../backoffice/backoffice.html");
} else {
	require_once "../config/db.php";
	require_once "../modelo/users-model.php";

	$userid = $_REQUEST['id'];
	eliminarUser($userid, $conexion);

	header("location: ../backoffice/adminUsuarios.php");
}
?>
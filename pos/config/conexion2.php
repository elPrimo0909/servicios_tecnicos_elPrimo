<?php
/*-------------------------
Autor: Adrian Monsalve
---------------------------*/
# conectare la base de datos.
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
	die("La sesión se ha cerrado por seguridad, por favor iniciar de nuevo ".mysqli_error($con));

	?>
	<a href="http://www.facturoe.com/login/">AQUÍ</a>
	<?

	?>
	<script language=javascript>
						function redirect(){
						  window.location = "index.php";
						}
						</script>

						<body onload="redirect()">

	<?
}
if (@mysqli_connect_errno()) {
	die("Conexión falló: ".mysqli_connect_errno()." : ".mysqli_connect_error());
}
?>

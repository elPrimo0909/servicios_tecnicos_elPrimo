<?php
/*-------------------------
Autor: Adrian Monsalve
---------------------------*/
# conectare la base de datos.
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_servicios");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


?>

<?php


/*-----------------------
Adrian Monsalve
----------------------------*/

ob_start();
session_start();

///print_r($_SESSION);
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings

$xx = $_SESSION['username'];


$nom= "facturoe_"; 

///echo $xx;
//$raiz = /*"facturoe_admin";*/$nom . $xx;

$array = array("$nom","$xx");       /* Coloca en un arreglo las 3 cadenas //////*/ 


/////$raiz="facturoe_admin";

$tyu = implode($array); 
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_pos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//
	# conectare la base de datos
  $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
	die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: ".mysqli_connect_errno()." : ".mysqli_connect_error());
}
/*Inicia validacion del lado del servidor*/
if (empty($_POST['id'])) {
	$errors[] = "ID vacío";
}  else if (
	!empty($_POST['id']) 

) {

	// escaping, additionally removing everything that could be (html/javascript-) code
	$pass     = mysqli_real_escape_string($con, (strip_tags($_POST["passusuario"], ENT_QUOTES)));
	$nitusuario     = mysqli_real_escape_string($con, (strip_tags($_POST["nitusuario"], ENT_QUOTES)));
	$usuario     = mysqli_real_escape_string($con, (strip_tags($_POST["usuario"], ENT_QUOTES)));
	
	$id         = intval($_POST['id']);

    
	$sql        = "UPDATE tbl_user SET username='".$usuario."',  password='".$pass."' WHERE id='".$id."'";
	$query_update = mysqli_query($con, $sql);
	if ($query_update) {
		$messages[] = "La información se actualizo correctamente.";
	} else {
		$errors[] = "Surgio un error, ingresa a AYUDA.".mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido, ingresa a AYUDA";
}

if (isset($errors)) {

	?>
	<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Se presento un error : </strong>
	<?php
	foreach ($errors as $error) {
		echo $error;
	}
	?>
	</div>
	<?php
}
if (isset($messages)) {

	?>
	<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>¡Aviso!</strong>
	<?php
	foreach ($messages as $message) {
		echo $message;
	}
	?>
	</div>
	<?php
}

?>
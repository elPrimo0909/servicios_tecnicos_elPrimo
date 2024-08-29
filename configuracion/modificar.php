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
} else if (empty($_POST['codigo'])) {
	$errors[] = "Identificación esta vacío";
} else if (empty($_POST['nombre'])) {
	$errors[] = "Nombre esta vacío";
} else if (empty($_POST['moneda'])) {
	$errors[] = "Dirección esta vacío";
} else if (empty($_POST['capital'])) {
	$errors[] = "Teléfono esta vacío";
} else if (empty($_POST['continente'])) {
	$errors[] = "Email esta vacío";
} else if (
	!empty($_POST['id']) &&
	!empty($_POST['codigo']) &&
	!empty($_POST['nombre']) &&
	!empty($_POST['moneda']) &&
	!empty($_POST['capital']) &&
	!empty($_POST['continente'])

) {

	// escaping, additionally removing everything that could be (html/javascript-) code
	$codigo     = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES)));
	$nombre     = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
	$moneda     = mysqli_real_escape_string($con, (strip_tags($_POST["moneda"], ENT_QUOTES)));
	$capital    = mysqli_real_escape_string($con, (strip_tags($_POST["capital"], ENT_QUOTES)));
	$continente = mysqli_real_escape_string($con, (strip_tags($_POST["continente"], ENT_QUOTES)));
	
	$resolucion = mysqli_real_escape_string($con, (strip_tags($_POST["resolucion"], ENT_QUOTES)));
	$autorizacion = mysqli_real_escape_string($con, (strip_tags($_POST["autorizacion"], ENT_QUOTES)));
	$prefijo = mysqli_real_escape_string($con, (strip_tags($_POST["prefijo"], ENT_QUOTES)));
	$numeroinicio = mysqli_real_escape_string($con, (strip_tags($_POST["numeroinicio"], ENT_QUOTES)));
	$responsable = mysqli_real_escape_string($con, (strip_tags($_POST["responsable"], ENT_QUOTES)));
	
	$numerofin = mysqli_real_escape_string($con, (strip_tags($_POST["numerofin"], ENT_QUOTES)));
	$codigoactividad = mysqli_real_escape_string($con, (strip_tags($_POST["codigoactividad"], ENT_QUOTES)));
	
	$vigencia = mysqli_real_escape_string($con, (strip_tags($_POST["vigencia"], ENT_QUOTES)));
	
	

	$id         = intval($_POST['id']);
	$sql        = "UPDATE configuracion SET nombre='".$nombre."',  nit='".$moneda."', email='".$codigo."', direccion='".$capital."', telefono='".$continente."', resolucion='".$resolucion."', autorizacion='".$autorizacion."', prefijo='".$prefijo."', numero_inicio='".$numeroinicio."', responsable_iva='".$responsable."', codigo_actividad='".$codigoactividad."', numero_fin='".$numerofin."', vigencia='".$vigencia."' WHERE id='".$id."'";
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
<?php
/*-----------------------
elPrimo
---------------------*/
# conectare la base de datos
ob_start();
session_start();
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
///print_r($_SESSION);

/*
$rtt = $_SESSION['username'];
//echo $rtt;
$regimen = $_SESSION['regimen'];
$creando = $_SESSION['crea_empresa'];
////echo $regimen;


$xx = $_SESSION['username'];

*/
//$nom= "facturoe_"; 

///echo $xx;
//$raiz = /*"facturoe_admin";*/$nom . $xx;

//$array = array("$nom","$xx");       /* Coloca en un arreglo las 3 cadenas //////*/ 


/////$raiz="facturoe_admin";

//$tyu = implode($array); 
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME","datos_servicios");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//
	# conectare la base de datos
  $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$con) {
	die("imposibsssle conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Connect failed: ".mysqli_connect_errno()." : ".mysqli_connect_error());
}
/*Inicia validacion del lado del servidor*/
if (empty($_POST['nombre'])) {
	$errors[] = "Código vacío";
}   else if (
	!empty($_POST['nombre']) 
) {

	// escaping, additionally removing everything that could be (html/javascript-) code

	$nombre     = mysqli_real_escape_string($con, (strip_tags($_POST["nombre"], ENT_QUOTES)));
	$nit     = mysqli_real_escape_string($con, (strip_tags($_POST["nit"], ENT_QUOTES)));
	$direccion    = mysqli_real_escape_string($con, (strip_tags($_POST["direccion"], ENT_QUOTES)));
	$email = mysqli_real_escape_string($con, (strip_tags($_POST["email"], ENT_QUOTES)));
	$telefono = mysqli_real_escape_string($con, (strip_tags($_POST["telefono"], ENT_QUOTES)));


/*
$insert = mysqli_query($con, "INSERT INTO facturas (id,numero,retension,tipo_retension,descuento,forma_pago,vencimiento,iva) VALUES ('$id','$numero_factura','$retension','$tipo_retension','$descuento','$forma_pago','$fecha','$iva')");
*/



	//$sql          = "INSERT INTO clientes2 (id, empresa, direccion, identificacion, telefono, email) VALUES ('$id','".$nombre."','".$cantidad2."','".$codigo."','".$capital."','".$continente."')";
	//$query_update = mysqli_query($con, $sql);

	$sql2          = "INSERT INTO ostemporalequipos (id, nombre, nit, direccion, email, telefono) VALUES ('$id','".$nombre."','".$nit."','".$direccion."','".$email."','".$telefono."')";
	$query_update2 = mysqli_query($con, $sql2);

	
	if ($query_update) {
		$messages[] = "El equipo se ingreso satisfactoriamente.";
	} else {
		$errors[] = "Equipo ingresado correctamente.".mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido.";
}

if (isset($errors)) {

	?>
	<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong></strong>
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
									<strong>¡Bien hecho!</strong>
	<?php
	foreach ($messages as $message) {
		echo $message;
	}
	?>
	</div>
	<?php
}

?>
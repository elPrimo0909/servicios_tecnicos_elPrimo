
<?

ob_start();
session_start();

///print_r($_SESSION);

$rtt = $_SESSION['username'];
//echo $rtt;
$regimen = $_SESSION['regimen'];
$creando = $_SESSION['crea_empresa'];
////echo $regimen;

$xx = $_SESSION['username'];


$nom= "facturoe_"; 


//$raiz = /*"facturoe_admin";*/$nom . $xx;

$array = array("$nom","$xx"); 
$tyu = implode($array); 
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", $tyu);//Nombre de la base de datos
define("DB_USER", "facturoe_Dios");//Usuario de tu base de datos
define("DB_PASS", "lPsTV4bjzBzz");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>

<SCRIPT LANGUAGE="JavaScript">
function redireccionar() {
setTimeout("location.href='http://www.facturoe.com/facturoe7/entradas/'");
}
window.onload = redireccionar;


</SCRIPT>


<?php


///js/admin.js .///aca estan las funciones para updadte, crear,etc

sleep(5);


$cixx         = 1;


$sql          = "UPDATE perfil SET  configurando_entradas ='".$cixx."'";
	$query_update = mysqli_query($con, $sql);
////

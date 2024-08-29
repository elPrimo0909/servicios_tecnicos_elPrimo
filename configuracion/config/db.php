
<?
session_start();
$xx = $_SESSION['username'];


$nom= "facturoe_"; 


//$raiz = /*"facturoe_admin";*/$nom . $xx;

$array = array("$nom","$xx");       /* Coloca en un arreglo las 3 cadenas //////*/ 


/////$raiz="facturoe_admin";

$tyu = implode($array);            /* Une los elementos del arreglo en una cadena separados por espacios */



?>

<?php


//$tyu="facturoe_2664";
	
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos

?>

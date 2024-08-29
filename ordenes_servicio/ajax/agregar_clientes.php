
<?php
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
////LISTA DE PRODUCTOS AGREGADOS A LA FACTURA

/*-------------------------
Autor: Adrian Monsalve
---------------------------*/
session_start();
$session_id                               = session_id();
if (isset($_POST['id'])) {$id             = $_POST['id'];}
if (isset($_POST['cantidad2'])) {$cantidad = $_POST['cantidad2'];}
if (isset($_POST['codigo'])) {$codigo     = $_POST['codigo'];}
if (isset($_POST['prec2'])) {$prec2         = $_POST['prec2'];}
if (isset($_POST['articulo'])) {$articulo = $_POST['articulo'];}
if (isset($_POST['prec88'])) {$prec88 = $_POST['prec88'];}
if (isset($_POST['descuentoproducto'])) {$descuentoproducto = $_POST['descuentoproducto'];}
if (isset($_POST['telefono'])) {$telefono = $_POST['telefono'];}


/// testing recogida POST
//echo $_POST['id'];

/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos


$perfil2    = mysqli_query($con, "select * from perfil limit 0,1");
$rw_perfil2 = mysqli_fetch_array($perfil2);


$sql_proveedor2 = mysqli_query($con, "select * from lista7 where id ='$id'");
$rw_proveedor2  = mysqli_fetch_array($sql_proveedor2);
$impuestos=$rw_proveedor2['impuesto'];
$prec19=$rw_proveedor2['precio_venta'];
///$prec88=1;
$insert_tmp = mysqli_query($con, "INSERT INTO ostemporalclientes (id,nombre, nit, direccion, telefono) VALUES (null,'$telefono','$prec88', '$cantidad', '$telefono'  )");



exit();




/*
 if ($impuestos==0) {
 	$prec44=$prec;
 }else{


$raiz_web="1.";

$url = "$raiz_web" . "$impuestos"; 

	

	$prec44= $prec/$url;


 }


//GURDANDO DATOS POST EN LA DB

if (!empty($id) and !empty($cantidad) and !empty($prec)) {


$campoX=utf8_decode($articulo);

$sql_proveedor2 = mysqli_query($con, "select * from ostemporal_cotizaciones where id ='$id'");
$rw_proveedor2  = mysqli_fetch_array($sql_proveedor2);
$idxx=$rw_proveedor2['id'];


if($id==$idxx){

	
?>

<div style="height: 10em;  "  >

<h4>

Error: ya agregaste este producto si quieres cambiar la cantidad, borralo y vuelvelo agregar especifcando la cantidad deseada en la lista de prodcutos.
<a  href="" onClick="window.location.reload()">Continuar</a>

</h4>

</div>

<?php


	exit();
}



	$insert_tmp = mysqli_query($con, "INSERT INTO ostemporal_cotizaciones (id,titulo) VALUES (null,'$articulo')");
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$id     = intval($_GET['id']);
	$delete = mysqli_query($con, "DELETE FROM ostemporal_cotizaciones WHERE id='".$id."'");
}

///TESTING pasar id correctamente
//echo $_POST['cantidad'];

?>
<table class="table">
<tr>
<th class="visible-md visible-lg">Código</th>


	<th>Cantidad</th>
	<th>Descripción</th>
	<th><span class="pull-right">Precio</span></th>
	<th><span class="pull-right">



	</span></th>
	<th class="visible-md visible-lg pull-right">Total</th>
	
	<th></th>
</tr>
<?php
$sumador_total = 0;

///testing/////echo $session_id;
///CONSULTA UTILIZANDO LA SESSION

$sql = mysqli_query($con, "select * from ostemporal_cotizaciones where celu ='".$session_id."' ORDER by id DESC ");
while ($row = mysqli_fetch_array($sql))

/*
$sql=mysqli_query($con, "select * from lista7 where id ='".$_POST['id']."'");
while ($row=mysqli_fetch_array($sql))


{
	$id_tmp          = $row["id"];
	$codigo_producto = $row['estado'];
	$cantidad        = $row['come'];
	$nombre_producto = $row['titulo'];
	$descuentoxx = $row['descuento'];
	$imp44 = $row['impuesto'];
	$precio          = $row['num'];
	if (!empty($id_marca_producto)) {
		$sql_marca              = mysqli_query($con, "select nombre_marca from marcas where id_marca='$id_marca_producto'");
		$rw_marca               = mysqli_fetch_array($sql_marca);
		$nombre_marca           = $rw_marca['nombre_marca'];
		$marca_producto         = " ".strtoupper($nombre_marca);
	} else { $marca_producto = '';}
	$precio_venta            = $row['precio_tmp'];
	$precio_venta_f          = number_format($precio_venta, 2);//Formateo variables
	$precio_venta_r          = str_replace(",", "", $precio_venta_f);//Reemplazo las comas
	$precio_total            = $precio_venta_r*$cantidad;
	$precio_total_f          = number_format($precio_total, 2);//Precio total formateado
	$precio_total_r          = str_replace(",", "", $precio_total_f);//Reemplazo las comas
	$sumador_total += $precio_total_r;//Sumador



////suma de cantidades
$canatidadsuma+=$cantidad;


////DECSUENTOS

//$descuento_final1=($precio*$descuentoxx)/100;
$descuento_final_producto=$descuento_final1*$cantidad;

$descuento_final_suma+=$descuento_final_producto;






////
$imp344=($precio*$imp44)/100;
    $cel2= floor($imp344);

$suma2=$precio+$cel2;




$suma3=$suma2*$cant88;


$suma33x=$cel2*$cantidad;


$suma8x+=$suma33x;






	$subto = $suma2*$cantidad;


$suma2qw+=$precio*$cantidad;


	$suma = $suma+$subto;

	?>
											<tr>

											<th class="visible-md visible-lg"><?php echo $codigo_producto;?></th>
												
												<td><?php echo $cantidad;?></td>
												<td><?php echo $nombre_producto

?></td>
												<td><span class="pull-right"><?php

	echo "$";

	$ip22 = $row['impuesto'];


$ers=($precio*$ip22)/100;

 $cel2= floor($ers);

$precioxxx=$precio+$cel2;

	echo number_format($precioxxx);?></span></td>
		<td><span class="pull-right"><?php

	


if ($rw_perfil2['regimen']=="Comun") {

	echo $row['impuesto']; echo "%";
}




 ?></span></td>


												<td><span class="visible-md visible-lg pull-right"><?echo "$"?><?php echo number_format($subto);?></span></td>



												<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp?>')">Eliminar</a></span></td>
											</tr>
	<?php
}

?>

<?

if (($rw_perfil2['papel_tamano']=="carta-2")) {
  

?>


<tr>


	<td></td>
</tr>
<?
}
?>
<?

if (($rw_perfil2['papel_tamano']=="media-carta-2")) {
  

?>


<tr>


	<td></td>
</tr>
<?
}
?>
<tr>
	<td colspan=5><span class="pull-right" style="font-size: 130%">SUB-TOTAL</span></td>
	<td><span class="pull-right" style="font-size: 130%" ><?php echo "$";
echo number_format($suma2qw);
?></span></td>

<tr>
	
</tr>
<tr>


<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	
	<td colspan=5><span class="pull-right" style="font-size: 130%">IMPUESTOS</span></td>
	<td><span class="pull-right" style="font-size: 130%" ><?php echo "$";
echo number_format($suma8x);
?></span></td>

<?
}
 */
?>


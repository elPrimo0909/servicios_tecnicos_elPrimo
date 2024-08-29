
<?php
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
////LISTA DE PRODUCTOS AGREGADOS A LA FACTURA

/*-------------------------
Autor: Adrian Monsalve
---------------------------*/
session_start();
$session_id                               = session_id();
if (isset($_POST['id'])) {$id             = $_POST['id'];}
if (isset($_POST['cantidad'])) {$cantidad = $_POST['cantidad'];}
if (isset($_POST['codigo'])) {$codigo     = $_POST['codigo'];}
if (isset($_POST['prec'])) {$prec         = $_POST['prec'];}
if (isset($_POST['articulo'])) {$articulo = $_POST['articulo'];}
if (isset($_POST['prec88'])) {$prec88 = $_POST['prec88'];}
if (isset($_POST['descuentoproducto'])) {$descuentoproducto = $_POST['descuentoproducto'];}


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

/*
if($id==$idxx){

	
?>

<div style="height: 10em;  "  >

<h4>

Error: ya agregaste este producto si quieres cambiar la cantidad, borralo y vuelvelo agregar especificando la cantidad deseada en la lista de productos.
<a  href="" onClick="window.location.reload()">Continuar</a>

</h4>

</div>

<?php


	exit();
}
*/


$sql_oste = mysqli_query($con, "select * from ostemporal_cotizaciones where titulo ='$articulo'");
$rw_proostes  = mysqli_fetch_array($sql_oste);
$titulo2=$rw_proostes['titulo'];
$cant1=$rw_proostes['come'];

$cantidad2=$cant1+1;

switch (true) {
    case $titulo2===$articulo:
		$sql5        = "UPDATE ostemporal_cotizaciones SET come='".$cantidad2."' WHERE titulo='".$articulo."'";
		$query_update = mysqli_query($con, $sql5);
		
        break;
    default:
		$insert_tmp = mysqli_query($con, "INSERT INTO ostemporal_cotizaciones (id,titulo,come,celu,num,estado,impuesto,descuento) VALUES (null,'$articulo','$cantidad','$session_id','$prec44','$codigo','$impuestos','$descuentoproducto')");
     

		

		}

	
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


	<th>Cant</th>
	<th>Descripción</th>
	<th><span class="pull-right">Precio</span></th>
	
	<th>Total</th>
	
	<th></th>
</tr>
<?php
$sumador_total = 0;

///testing/////echo $session_id;
///CONSULTA UTILIZANDO LA SESSION
$sumador_total=0;
$precio=0;
$cantidad=0;
$precio_producto=0;
$impuesto1=0;
$impuesto4=0;
$impuesto5=0;
$sql = mysqli_query($con, "select * from ostemporal_cotizaciones  ORDER by id DESC ");
while ($row = mysqli_fetch_array($sql))

/*
$sql=mysqli_query($con, "select * from lista7 where id ='".$_POST['id']."'");
while ($row=mysqli_fetch_array($sql))
 */

{
	$id_tmp          = $row["id"];
	$codigo_producto = $row['estado'];
	$cantidad        = $row['come'];
	$nombre_producto = $row['titulo'];
	$descuentoxx = $row['descuento'];
	$impuesto1 = $row['impuesto'];
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
	///$precio_total            = $precio_venta_r*$cantidad;
	$precio_total_f          = number_format($precio_total, 2);//Precio total formateado
	$precio_total_r          = str_replace(",", "", $precio_total_f);//Reemplazo las comas
	
	$precio_productof=$precio*$cantidad;
	$sumador_total += $precio_productof;//Sumador
//$impuesto1=0;
$hola=0;
$porc=0;
	if($impuesto1==$hola) {
		$porc=0;
			}else{
				$porc=1;
			}

		
//$porc=10;
  $porc;
	$raiz_im="1.";

$impuesto4 = "$raiz_im" . "$impuesto1"; 
$impuesto5= ($precio_productof-($precio_productof /$impuesto4))  *$porc ;

$impuestosuma += $impuesto5;//Sumador



	//$subto = $suma2*$cantidad;


//$suma2qw+=$precio*$cantidad;


	$suma = $suma+$subto;

	?>
											<tr>

											<th class="visible-md visible-lg"><?php echo $codigo_producto;?></th>
												
												<td><?php echo $cantidad;?></td>
												<td><?php echo $nombre_producto

?></td>
												<td><span class="pull-right"><?php


echo "$";	echo number_format($precio);?></span></td>



			<td><span class="pull-right"><?php
		echo "$";	echo  number_format($precio_productof) ;
//echo " ";		echo  $impuesto5 ;
			?></span></td>


					

												<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp?>')">X</a></span></td>
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
	<td colspan=3><span class="pull-right" style="font-size: 130%">SUB-TOTAL</span></td>
	<td><span class="pull-right" style="font-size: 130%" ><?php echo "$";
echo number_format($sumador_total-$impuestosuma);
?></span></td>

<tr>
	
</tr>
<tr>


<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	
	<td colspan=3><span class="pull-right" style="font-size: 130%">IMPUESTOS</span></td>
	<td><span class="pull-right" style="font-size: 130%" ><?php echo "$";
echo number_format($impuestosuma);
?></span></td>

<?
}

?>

	



	<td></td>
</tr>
<tr>
	<td colspan=3><span class="pull-right" style="font-size: 130%">Paga Con:</span></td>
	<td><span class="pull-right" style="font-size: 130%" ><?php
	
	
$pagacon10=0;
	$count_query    = mysqli_query($con, "select * from ostemporal_parqueadero where titulo!='' order by id DESC limit 1");

	$row1         = mysqli_fetch_array($count_query);
    $titulo2=$row1['titulo'];

?> <h4> <?php

if($titulo2==0){

  
  //  exit();
  $pagacon10=$row1['num'];
}
else{

	 $pagacon10=$row1['titulo'];
    //exit();
}

if($pagacon10==9){
	echo "Digital";
}else{

	echo number_format($pagacon10) ;

}

?></span></td>

<tr>
<tr style="background-color:yellow" >
	<td colspan=3><span class="pull-right" style="font-size: 130%">Devuelta:</span></td>
	<td><span class="pull-right" style="font-size: 130%" ><?php
	$devuelta=0;
	$devuelta =$pagacon10-$sumador_total;
	if($devuelta<0){

		echo "$";
		echo "0.00";
	}
	else{

		echo "$";
		echo number_format($devuelta);


	}
	

?></span></td>

<tr>
</tr>
<tr>
	<td colspan=3><span class="pull-right" style="font-size: 150%; background-color:red; padding:5px; color:white" >TOTAL A PAGAR:</span></td>
	<td><span class="pull-right" style="font-size: 150%; background-color:red; padding:5px; color:white" ><?php echo "$";
echo number_format($sumador_total);
?></span>
<br><br><br><br><br><br><br><br><br><br><br><br>

</td>


	<td></td>
</tr>


</table>

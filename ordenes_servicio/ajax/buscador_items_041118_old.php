
<script type="text/javascript">
$(document).ready(function(){
    $("#myModal").on('shown.bs.modal', function(){
        $(this).find('#q').focus();
    });
});
</script>



<?php



//SE LISTA PRODUCTOS PARA AGREGAR A LA FACTURA
/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos


$perfil2    = mysqli_query($con, "select * from perfil limit 0,1");
$rw_perfil2 = mysqli_fetch_array($perfil2);



$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if ($action == 'ajax') {
	// escaping, additionally removing everything that could be (html/javascript-) code
	$q        = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$aColumns = array('id', 'codigo', 'descripcion');//Columnas de busqueda
	$sTable   = "lista7";
	$sWhere   = "";
	if ($_GET['q'] != "") {
		$sWhere = "WHERE (";
		for ($i = 0; $i < count($aColumns); $i++) {
			$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
		}
		$sWhere = substr_replace($sWhere, "", -3);
		$sWhere .= ')';
	}
	include 'pagination.php';//include pagination file
	//pagination variables
	$page      = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page  = 5;//how much records you want to show
	$adjacents = 4;//gap between pages after number of adjacents
	$offset    = ($page-1)*$per_page;
	//Count the total number of row in your table*/
	$count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere ");
	$row         = mysqli_fetch_array($count_query);
	$numrows     = $row['numrows'];
	$total_pages = ceil($numrows/$per_page);
	$reload      = './index.php';
	//main query to fetch the data
	$sql   = "SELECT * FROM  $sTable $sWhere ORDER by id DESC LIMIT $offset,$per_page";
	$query = mysqli_query($con, $sql);
	//loop through fetched data
	if ($numrows > 0) {

		?>
		<div class="table-responsive">
<table class="table">
<tr  class="">
<th>Código</th>
<th>Descripción</th>

<th><span class="pull-right">Cantidad</span></th>


<th><span class="pull-right">Valor Venta</span></th>

<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	

<th><span class="pull-right">Valor</span></th>

<?
}

?>






<th style="width: 36px;"></th>
</tr>
		<?php while ($row = mysqli_fetch_array($query)) {
			$id_producto       = $row['id'];
			$codigo            = $row['codigo'];
			$imp1            = $row['impuesto'];
			$articulo          = $row['descripcion'];
			//$id_marca_producto = $row['id_marca_producto'];
			//$codigo_producto   = $row["codigo_producto"];
			///$sql_marca         = mysqli_query($con, "select nombre_marca from marcas where id_marca='$id_marca_producto'");
			//$rw_marca          = mysqli_fetch_array($sql_marca);
			//$nombre_marca      = $rw_marca['nombre_marca'];
			$prec              = $row["precio_venta"];








			?>
			<tr>
			<td><?php echo $codigo;?></td>
			<td><?php echo $articulo?></td>



			<td class='col-xs-1'>
			<div class="pull-right">
			<!--  enviar la variable a ajax-->
			<input type="hidden" class="form-control" style="text-align:right" id="codigo_<?php echo $id_producto;?>"  value="<?php echo ($codigo)?>" >

			<input type="hidden" class="form-control" style="text-align:right" id="articulo_<?php echo $id_producto;?>"  value="<?php echo ($articulo)?>" >
			<input type="hidden" class="form-control" style="text-align:right" id="prec88_<?php echo $id_producto;?>"  value="<?php echo ($prec)?>" >


			<input type="number" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto;?>"  value="1" >



			</div></td>

			<?php 





$ersa=($prec*$imp1)/100;

 $cel2aa= floor($ersa);

$przzec=$prec+$cel2aa;

			 ?>


			</div></td>

	<td class='col-xs-2'><div class="pull-right">
			<input type="number" class="form-control" style="text-align:right" id="prec_<?php echo $id_producto;?>"  value="<?php

	



			echo  ($przzec)?>" >


			</div></td>





<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	
<td class='col-xs-1'><div class="pull-right" >
			<?php  echo "$"; echo number_format($prec) ; ?>


			</div></td>
			</div></td>


			<td class='col-xs-1'><div class="pull-right" >
			<?php echo ($imp1); echo "%"; ?>
			
			<img src="../inventario_f/imagenes/images.png" width="100px"  >


<?
}

?>






			</div></td>
			<td ><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_producto?>')">Agregar</i></a></span></td>
			</tr>
			<?php
		}
		?>
		<tr>
		<td colspan=5><span class="pull-right"><?php
		echo paginate($reload, $page, $total_pages, $adjacents);
		?></span></td>
		</tr>
		</table>
		</div>
		<?php
	}
}
?>
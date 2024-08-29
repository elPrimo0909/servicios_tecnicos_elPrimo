<?php
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
?>


<?php



//SE LISTA PRODUCTOS PARA AGREGAR A LA FACTURA
/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos


$count_query    = mysqli_query($con, "select * from ostemporalclientes where email='' order by id DESC limit 1");

	$row1         = mysqli_fetch_array($count_query);

?> <h4> <?php
	echo "Cliente: "	; echo 	$numrows     = $row1['nombre'];
?></h4> <?php

/*
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if ($action == 'ajax') {
	// escaping, additionally removing everything that could be (html/javascript-) code
	$q        = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$aColumns = array('id', 'empresa', 'identificacion');//Columnas de busqueda
	$sTable   = "clientes2";
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
	//Count the total number of row in your table
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
<th>Identificacion</th>
<th>Nombres</th>







<th style="width: 36px;"></th>
</tr>
		<?php while ($row = mysqli_fetch_array($query)) {
			$id_producto       = $row['id'];
			$codigo            = $row['empresa'];
			$imp1            = $row['identificacion'];
		







			?>
			<tr>
			<td><?php echo $imp1;?></td>
			<td><?php echo $codigo?></td>



			<td class='col-xs-1'>
			<div class="pull-right">
			<!--  enviar la variable a ajax-->
			<input type="hidden" class="form-control" style="text-align:right" id="codigo_<?php echo $id_producto;?>"  value="<?php echo ($codigo)?>" >

		</div></td>

			<?php 




			 ?>


			</div></td>

	<td class='col-xs-2'><div class="pull-right">
		
			</div></td>





<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	
<td class='col-xs-1'><div class="pull-right" >
	

			</div></td>
			</div></td>


			<td class='col-xs-1'><div class="pull-right" >
			<?php echo ($imp1); echo "%"; ?>


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
}  */
?>
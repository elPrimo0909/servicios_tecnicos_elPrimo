
<script type="text/javascript">
$(document).ready(function(){
    $("#myModal").on('shown.bs.modal', function(){
        $(this).find('#q').focus();
    });
});
</script>

  <style>
    .contenido{
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 125px;
    }
    
    @media screen and (max-width: 480px) {
      .contenido{
        grid-template-columns: 1fr;
        color: red;
      }
    }
  </style>



<?php

error_reporting(E_ERROR | E_PARSE); ////no listar Warnings

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
	$sWhere   = "where destacado='1'";
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
	$per_page  = 20;//how much records you want to show
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
		<div class="contenedor">
<tr  class="">


<?
if ($rw_perfil2['regimen']=="Comun") {

	?>
	



<?
}

?>






</tr>
		<?php while ($row = mysqli_fetch_array($query)) {
			$id_producto       = $row['id'];
			$codigo            = $row['codigo'];
			$imp1            = $row['impuesto'];
			$articulo          = $row['descripcion'];
			$precio_venta          = $row['precio_venta'];
			//$id_marca_producto = $row['id_marca_producto'];
			//$codigo_producto   = $row["codigo_producto"];
			///$sql_marca         = mysqli_query($con, "select nombre_marca from marcas where id_marca='$id_marca_producto'");
			//$rw_marca          = mysqli_fetch_array($sql_marca);
			//$nombre_marca      = $rw_marca['nombre_marca'];
			$prec              = $row["precio_venta"];


			$imagees   = mysqli_query($con, "SELECT * FROM image where db = '".$id_producto."' order by id DESC");
			$row1= mysqli_fetch_array($imagees);
		 $imag4 = $row1['nombre'];





			?>
			<tr>
		



		
			<!--  enviar la variable a ajax-->
			<input type="hidden" class="form-control" style="text-align:right" id="codigo_<?php echo $id_producto;?>"  value="<?php echo ($codigo)?>" >

			<input type="hidden" class="form-control" style="text-align:right" id="articulo_<?php echo $id_producto;?>"  value="<?php echo ($articulo)?>" >
			<input type="hidden" class="form-control" style="text-align:right" id="prec88_<?php echo $id_producto;?>"  value="<?php echo ($prec)?>" >


			<input type="hidden" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto;?>"  value="1" >



			<?php 





$ersa=($prec*$imp1)/100;

 $cel2aa= floor($ersa);

$przzec=$prec+$cel2aa;





			 ?>


		<input type="hidden" class="form-control" style="text-align:right" id="prec_<?php echo $id_producto;?>"  value="<?php

	



			echo  ($przzec)?>" >

<a href="#" >
<div class="contenedor"  style="background-color:blue  " >
<img style=" " src="../inventario_f/imagenes/<?php  echo $imag4  ?>" width="180px" onclick="agregar('<?php echo $id_producto?>')" >

<div class="texto-encima" style="background-color:white; color: green; padding:2px ; font-weight: bold; "  ><?php echo   $articulo
; echo "<br>";echo "$"; echo  number_format($precio_venta);

?></div>
</a>
</div>
			
			

<?
}

?>



</tr></div>


			</div></td>
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
<style>
	.contenedor{
    position: relative;
    display: inline-block;
    text-align: center;
	
}
.texto-encima{
    position: absolute;
    top: 10px;
    left: 10px;
}
.centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>


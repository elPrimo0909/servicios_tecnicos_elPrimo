<?php
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings

?>
<script type="text/javascript">
$(document).ready(function(){
    $("#myModalayuda").on('shown.bs.modal', function(){
        $(this).find('#q2').focus();
    });
});
</script>



<?php



//SE LISTA PRODUCTOS PARA AGREGAR A LA FACTURA
/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos



$count_query    = mysqli_query($con, "select * from ostemporalclientes where nombre!='' order by id DESC limit 1");

	$row1         = mysqli_fetch_array($count_query);
    $titulo=$row1['titulo'];

?> <h4> <?php
echo "Cliente: "	;
 echo $row1['nombre'] ;
    

	 
    exit();
?></h4> 
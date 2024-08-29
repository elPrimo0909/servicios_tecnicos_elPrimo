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



$count_query    = mysqli_query($con, "select * from ostemporal_parqueadero where titulo!='' order by id DESC limit 1");

	$row1         = mysqli_fetch_array($count_query);
    $titulo=$row1['titulo'];

?> <h4> <?php
echo "Paga Con: "	;
if($titulo==0){

  echo "$";  echo number_format($row1['num']) ;
    exit();
}else if ($titulo==9){

    echo "Pago Digital";
}else{

    echo "$"; echo number_format($row1['titulo'])	;

}

	 
    exit();
?></h4> 
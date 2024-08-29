<!--<body onload="window.print()"></body>
-->


<?php

ob_start();
session_start();
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
///print_r($_SESSION);
//$xx = $_SESSION['username'];



//print_r($_SESSION);

 // $user = $_SESSION['user'];



error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
  $id = $_GET['id'];
///FECHA
date_default_timezone_set('America/Bogota');


define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_pos");//Nombre de la base de datos_pos
define("DB_USER", "root");//Usuario de tu base de datos_pos
define("DB_PASS", "");//Contraseña del usuario de la base de datos_pos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$idx= $_GET['idx'];



?>

<style>
.bloquefactura{

    background-color: white;
    border:2px solid;
    width: 302.3622047244px  ;
    margin:auto;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    
    
}

</style>
<script type="text/javascript">
<!--
window.print();
//-->
</script>
<?php


//date_default_timezone_set("GMT");
//echo date("Y-m-d H:i:s", time()); 

 $fecha_creacionhoy = date("d/m/Y H:i:s");



$sql   = "SELECT * FROM facturas where id='".$idx."'";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) { ?> <br><?php
   $idfactura       = $row['numero'];
  $fecha_creacion     = $row['fecha'];
  $nombrecliente       = $row['cliente'];
  $nitcliente       = $row['cc'];
  $direccioncliente       = $row['direccion'];
  $telefonocliente       = $row['telefono'];
  $user       = $row['usuario'];
  $subtotalxx       = $row['subtotal'];
  $impuestosxx       = $row['impuestos'];
  $totalxx       = $row['total'];
  $impuestoxx       = $row['iva'];
  $usuario900       = $row['usuario'];
  $pagacon900       = $row['pagacon'];
  
   }


 





   

$sqlx   = "SELECT * FROM configuracion order by id ASC limit 1";
$queryx = mysqli_query($con, $sqlx);

while ($rowx = mysqli_fetch_array($queryx)) { ?> <br><?php
   $nombre       = $rowx['nombre'];

   $nit       = $rowx['nit'];
   $email       = $rowx['email'];
   $resolucion       = $rowx['resolucion'];
   $autorizacion       = $rowx['autorizacion'];
 
   $prefijo       = $rowx['prefijo'];
 
   //$vigencia       = $rowx['vigencia'];
   $responsable       = $rowx['responsable_iva'];
   $codigo_actividad       = $rowx['codigo_actividad'];
   $direccion       = $rowx['direccion'];
   $telefono       = $rowx['telefono'];
   $numeroinicio       = $rowx['numero_inicio'];
   $numerofin       = $rowx['numero_fin'];
   $vigencia       = $rowx['vigencia'];

   }




?>

<div class="bloquefactura"  >
<?php

$subtotal=0;
$count_query = mysqli_query($con, "SELECT * FROM configuracion order by id DESC");
$row         = mysqli_fetch_array($count_query);
  $logo     = $row['logo'];


?>
<img src="../configuracion/uploads/<?php echo $logo  ?>"  width="200px" ><br><br>




<?php echo $nombre  ?>
<br><?php echo $nit  ?>

<br><?php echo $direccion  ?>
<br><?php echo "Resolución DIAN: "; echo $resolucion  ?>
<br><?php echo "Telefóno: "; echo $telefono  ?>
<br><?php echo "Autorizada el: "; echo $autorizacion  ?>

<br><?php echo "Prefijo POS del"; echo $numeroinicio; echo " al "; echo $numerofin  ?>

<br><?php echo "Vigencia: "; echo $vigencia; echo " Meses" ?>

<br><?php  echo "Responsable de IVA:"; echo $responsable  ?>

<br>Codigo Actividad: <?php echo $codigo_actividad  ?>
<hr>
<?php echo "Sistema POS: ";


$count_queryt = mysqli_query($con, "SELECT * FROM configuracion where logo = '' order by id ASC");
$rowt         = mysqli_fetch_array($count_queryt);
 $idpre     = $rowt['id'];
 $prefijo     = $rowt['prefijo'];
  $numeroini     = $rowt['numero_inicio'];
 $numeracion     = $rowt['numeracion'];
$separador="-";

///valido el arranque de la numercion y suma de los siguientes consecutivos
if($numeracion==0){
$numeroini2=$numeroini+1;
  $numeracionfinal = "$prefijo" . "$separador". "$numeroini2"; 
}else{

  $numeroini2=$numeracion+1;
  $numeracionfinal = "$prefijo" . "$separador". "$numeroini2"; 

}


$sqlp          = "UPDATE configuracion SET  numeracion ='".$numeroini2."'  where id = '".$idpre."'  ";
	$query_updatep = mysqli_query($con, $sqlp);

///////////////////////

 //$numeracionfinal = "$prefijo" . "$separador". "$numeroini"; 

 

echo $idfactura;       ?><br>
<?php echo "Fecha: ";echo $fecha_creacion       ?><br>
<?php  echo "Cliente: "; echo $nombrecliente; ?>
<br><?php echo "CC/NIT: ";  echo $nitcliente; ?>
<br><?php echo "Dirección: ";  echo $direccioncliente; ?>
<br><?php echo "Teléfono: "; echo $telefonocliente; ?>
<br><?php echo "Vendedor: "; echo $usuario900; ?>

<br>
<table style="width:100%" >
  <th><span class="pull-right">Cant</span></th>
<th><span class="pull-right">Descripcion</span></th>
<th><span class="pull-right">V. Uni</span></th>
<th><span class="pull-right">Valor</span></th>
 
  <?php 
$subtotal1=0;
$subtotal=0;
$precio1=0;
$impuestosuma=0;
$impuesto=0;
$impuesto4=0;
$impuesto5;
$hola=0;
    $porc=0;
$sql   = "SELECT * FROM detalles_facturas where FACTURA = '".$idfactura."' ";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) { ?> <br><?php
   $id       = $row['titulo'];
    $titulo       = $row['DESCRIPCION'];
    $cantidad       = $row['CANTIDAD'];
    $costo       = $row['COSTO'];
    $codigopf       = $row['estado'];
    
    $subtotal1 = $precio1*$cantidad;
    $subtotal += $subtotal1;
///validar si tiene impuesto

    if($imp1==$hola) {
      $porc=0;
        }else{
          $porc=1;
        }
  ////creando code impuesto
    $raiz="1.";
  
  $impuesto4 = "$raiz" . "$imp1"; 
  $impuesto5= ($subtotal1-($subtotal1/$impuesto4)) *$porc ;
  
  $impuestosuma += $impuesto5;//Sumador
  
 
  
?>
<tr></tr>
<td><?php echo $cantidad;?></td>

<td><?php echo $titulo;?></td>
<td><?php  echo "$"; echo number_format($costo) ?></td>
<td><?php echo "$"; echo number_format($costo*$cantidad) ;  ?>
<?php

//$insert_tmp = mysqli_query($con, "INSERT INTO  detalles_facturas (id,FACTURA,CODIGO, DESCRIPCION, CANTIDAD, COSTO, fecha_creacion) VALUES (null,'$numeracionfinal','$codigopf','$id','$cantidad','$precio1','$fecha_creacion' )");


}
?>
</td>
</tr>

  </tr>
 
</table><div style="font-size: 1.2em;  "  >
<div  >
<div  style="text-align: left;  padding:30px  "  >

<br>Subtotal: <?php echo "$";
$subtotalfinal=$subtotal-$impuestosuma;

echo number_format($subtotalxx)   ?>
<br>
Impuesto:<?php echo "$"; echo number_format($impuestosxx)   ?><br>
Total: <?php echo "$"; echo number_format($totalxx)   ?><br>
Forma de pago:<?php

if($pagacon900==9){

  echo "Digital";
}else{
  echo "Efectivo";
}

?>


<br>
Paga con: $ <?php

$pagaconf=0;
$pagacon5=0;
$pagacon2=0;


   if($pagacon==0){
    $pagacon2= $pagaconf-$subtotal;
    $pagaconx=$pagaconf;

  }else{

 $pagacon2= $pagacon-$subtotal;
 $pagaconx=$pagacon;
  }

  echo number_format($pagaconx) ;

/*

if($pagacon==0){

echo number_format($pagaconf);

}else{

echo number_format($pagacon);
}

*/


?><br>
Devuelta: $<?php echo number_format($pagacon2);
   ?>
<hr>
<div  style="font-size:0.7em  " >

<div style="text-align:center  "  >Impuestos</div>
<br>

<?php

echo "Impuesto:"; echo $impuestoxx; echo "%";echo "-";
echo "Base: ";echo "$"; echo number_format($subtotalxx)  ;echo "-"; echo "Valor:"; 
echo "$"; echo  number_format($impuestosxx);




//$insert_factura = mysqli_query($con, "INSERT INTO  facturas (id,numero,subtotal, impuestos, total, fecha, iva, usuario, cliente, cc, direccion, telefono) VALUES (null,'$numeracionfinal'
//,'$subtotalfinal','$impuestosuma','$subtotal','$fecha_creacion','$imp1','$user','$nombrecliente','$nitcliente','$direccioncliente','$telefonocliente' )");



//mysqli_query($con, "TRUNCATE TABLE ostemporal_cotizaciones");
//mysqli_query($con, "TRUNCATE TABLE ostemporalclientes");
//mysqli_query($con, "TRUNCATE TABLE ostemporal_parqueadero");


?>
</div>
<hr>
<br><br>
Gracias por su compra


</div>

</div>



</div>

</div>


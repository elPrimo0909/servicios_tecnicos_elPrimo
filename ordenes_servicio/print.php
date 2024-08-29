<!--<body onload="window.print()"></body>
-->


<?php

ob_start();
session_start();
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
///print_r($_SESSION);
//$xx = $_SESSION['username'];



//print_r($_SESSION);

  $user = $_SESSION['user'];



error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
  $id = $_GET['id'];
///FECHA
date_default_timezone_set('America/Bogota');


define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_servicios");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

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
      

<?php


//date_default_timezone_set("GMT");
//echo date("Y-m-d H:i:s", time()); 

 $fecha_creacion = date("d/m/Y H:i:s");



$sql   = "SELECT * FROM ostemporalclientes where nombre!='' order by id DESC limit 1";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) { ?> <br><?php
  $nombrecliente       = $row['nombre'];


  

   }



   $sqlz   = "SELECT * FROM clientes2 where empresa ='".$nombrecliente."' ";
   $queryz = mysqli_query($con, $sqlz);
   
   while ($rowz = mysqli_fetch_array($queryz)) { ?> <br><?php
   
     $nitcliente       = $rowz['identificacion'];
     $direccioncliente       = $rowz['direccion'];
     $telefonocliente       = $rowz['telefono'];
     
   
      }
   




   $pagaconf=0;
$pagacon5=0;
$pagacon2=0;

$sqlx   = "SELECT * FROM ostemporalequipos order by id DESC limit 1";
$queryx = mysqli_query($con, $sqlx);

while ($rowx = mysqli_fetch_array($queryx)) { 
   $pagacon       = $rowx['nombre'];
 
  


   }

 if($nombrecliente==""){


 echo "<h3>"; echo  "Ingresa un cliente"; echo "</h4>";

  exit();
 }elseif($pagacon==""){

  
 echo "<h3>";   echo "Ingresa con cuanto dinero pagan";
 echo "</h4>";


  exit();
 }
?>

<!----
<script type="text/javascript">
<!--
window.print();
//-->
</script>

<?php
   

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

<br><?php 
if($responsable=="Si"){
  echo "Responsable de IVA:"; 
}

 ?>

<br>Codigo Actividad: <?php echo $codigo_actividad  ?>
<hr>
<?php echo "<h4>"; echo "Orden de Servicio Técnico"; echo "</h4>";


$count_queryt = mysqli_query($con, "SELECT * FROM configuracion where logo = '' order by id ASC");
$rowt         = mysqli_fetch_array($count_queryt);
 $idpre     = $rowt['id'];
 $prefijo     = $rowt['prefijo'];
  $numeroini     = $rowt['numero'];
 $numeracion     = $rowt['numeracion'];
$separador="-";

///valido el arranque de la numercion y suma de los siguientes consecutivos
if($numeroini==""){
$numeroini2=1;
  $numeracionfinal = $numeroini2; 
}else{

  $numeroini2=$numeracion+1;
  $numeracionfinal = $numeroini2; 

}


$sqlp          = "UPDATE configuracion SET  numeracion ='".$numeroini2."'  where id = '".$idpre."'  ";
	$query_updatep = mysqli_query($con, $sqlp);

///////////////////////

 //$numeracionfinal = "$prefijo" . "$separador". "$numeroini"; 

 

echo $numeracionfinal;       ?><br>
<?php echo "Fecha: ";echo $fecha_creacion       ?><br>
<?php  echo "Cliente: "; echo $nombrecliente; ?>
<br><?php echo "CC/NIT: ";  echo $nitcliente; ?>
<br><?php echo "Dirección: ";  echo $direccioncliente; ?>
<br><?php echo "Teléfono: "; echo $telefonocliente; ?>
<br><?php echo "Vendedor: "; echo $user; ?>

<br>
<table style="width:100% ; "    >
 
 
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
$sql   = "SELECT * FROM ostemporalequipos order by id DESC limit 1";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) { ?> <br><?php
   $id       = $row['titulo'];

   
    $precio1       = $row['nombre'];
    $serial       = $row['direccion'];
    $sintomas       = $row['nit'];
    $accesorios       = $row['telefono'];
    
    $condicion       = $row['email'];
    
}
?>
</td>
</tr>

  </tr>
 
</table><div style="font-size: 1.2em;  "  >
<div style=" background-color:red; text-align:left; padding-left:10px "  >

<?php  echo "Equipo: "; echo $precio1 ; echo "<br>";  echo "Serial: "; echo $serial;  echo "<br>"; echo "Sintomas: "; echo $sintomas;

echo "<br>"; echo "Accesorios: "; echo $accesorios;echo "Estado fisico: "; echo $condicion;


$insert_factura = mysqli_query($con, "INSERT INTO  ordenesservicio (id,numero,equipo,accesorios,sintomas, estado) VALUES (null,'$numeracionfinal','$precio1','$accesorios','$sintomas','$condicion')");
?>





<div  style="text-align: left;  padding:30px  "  >

<br>Subtotal: <?php echo "$";
$subtotalfinal=$subtotal-$impuestosuma;

echo number_format($subtotalfinal)   ?>
<br>
Impuesto:<?php echo "$"; echo number_format($impuestosuma)   ?><br>
<h2>
Total: <?php echo "$"; echo number_format($subtotal)   ?><br>
</h2>
Forma de pago:Contado


<br>
Paga con: $ <?php




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

echo "Impuesto:"; echo $imp1; echo "%";echo "-";
echo "Base: ";echo "$"; echo number_format($subtotalfinal)  ;echo "-"; echo "Valor:"; 
echo "$"; echo  number_format($impuestosuma);







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


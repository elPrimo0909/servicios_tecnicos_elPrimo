<?php
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings

define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_pos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$count_query = mysqli_query($con, "SELECT * FROM configuracion order by id ASC");
$row         = mysqli_fetch_array($count_query);
$nombre     = $row['nombre'];

$nit     = $row['nit'];

$direccion     = $row['direccion'];

$email     = $row['email'];
$resolucion     = $row['resolucion'];


$telefono     = $row['telefono'];
$autorizacion     = $row['autorizacion'];
$prefijo     = $row['prefijo'];
$numeroinicio     = $row['numero_inicio'];
$numerofin     = $row['numero_fin'];
$responsable     = $row['responsable_iva'];
$codigoactividad     = $row['codigo_actividad'];
$numerofin     = $row['numero_fin'];
$vigencia     = $row['vigencia'];





?>

<h5>Razon Social:<?php echo " "; echo $nombre ?></h5>

<h5>Nit/CC:<?php echo " "; echo $direccion ?></h5>

<h5>Dirección:<?php echo " "; echo $nit ?></h5>
<h5>Email:<?php echo " "; echo $telefono ?></h5>






<h5>Teléfono:<?php echo " "; echo $email ?></h5>



<h5>Resolución DIAN:<?php echo " "; echo $resolucion ?></h5>
<h5>Autorización:<?php echo " "; echo $autorizacion ?></h5>
<h5>Prefijo:<?php echo " "; echo $prefijo ?></h5>
<h5>Número de inicio:<?php echo " "; echo $numeroinicio ?></h5>
<h5>Número de fin:<?php echo " "; echo $numerofin ?></h5>

<h5>Vigencia Meses:<?php echo " "; echo $vigencia ?></h5>

<h5>Responsable de IVA:<?php echo " "; echo $responsable ?></h5>

<h5>Actividad económica codigo:<?php echo " "; echo $codigoactividad ?></h5>



<button type="button" class="btn btn-sample" class="btn pull-right" data-toggle="modal" data-target="#dataUpdate"   data-id="<?php echo $row['id']?>" data-codigo="<?php echo $row['nit']?>" data-nombre="<?php echo $row['nombre']?>" data-moneda="<?php echo $row['direccion']?>" data-capital="<?php echo $row['telefono']?>" data-continente="<?php echo $row['email']?>" data-resolucion="<?php echo $row['resolucion']?>" data-autorizacion="<?php echo $row['autorizacion']?>" data-prefijo="<?php echo $row['prefijo']?>" data-numeroinicio="<?php echo $numeroinicio?>"  data-responsable="<?php echo $responsable?>" data-codigoactividad="<?php echo $codigoactividad  ?>" ><i class=''></i>Modificar datos</button>
       
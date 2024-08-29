

<!--VENTANA PRINCIPAL WEBAPP





pedido_pdf.php. Muestra vista de fatcura y sincroniza db
pedido_html.php.....PLANTILLA FACTURA
231018 SE AGREGR CONTADOR DE DOCENAS PARA LAS PLANTILLAS CARTA-2 Y MEDIA CARTA 2

-->


<?php
ob_start();
session_start();
error_reporting(E_ERROR | E_PARSE); ////no listar Warnings
///print_r($_SESSION);
//$xx = $_SESSION['username'];

?>




<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come firdddddst in the head; any other head content must comess *after* these tags -->
    <title>Ordenes de Servicio Técnico</title>



    <link rel="icon" type="image/png" sizes="64x64" href="../inventario_f/imagenes/favicon_final_1.png">




<?php



//print_r($_SESSION);

  $rtt = $_SESSION['user'];

if ($rtt == "") {

  ?>
  <SCRIPT LANGUAGE="JavaScript">
function redireccionar() {
setTimeout("location.href='../login/'");
}
window.onload = redireccionar;


</SCRIPT>



  <?php
}else if ($rtt == "1") {

  ?>
  <SCRIPT LANGUAGE="JavaScript">
function redireccionar() {
setTimeout("location.href='../login/'");
}
window.onload = redireccionar;


</SCRIPT>



  <?php
}

$nom= "facturoe_"; 


//$raiz = /*"facturoe_admin";*/$nom . $xx;
//$array = array("$nom","$xx"); 
///$tyu = implode($array); 
define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_servicios");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

include 'modal_nuevo_equipo.php';
include 'modal_nuevo_cliente.php';
include 'modal_nuevo_cliente2.php';


$perfil2    = mysqli_query($con, "select * from perfil limit 0,1");
$rw_perfil2 = mysqli_fetch_array($perfil2);


 
/*
///configuracion cliente
$nocli = $rw_perfil2['configurando_cliente'];
if ($nocli == 0) {

  ?>
  <SCRIPT LANGUAGE="JavaScript">
function redireccionar() {
setTimeout("location.href='clientes/'");
}
window.onload = redireccionar;


</SCRIPT>



  <?php
} else {
  //echo "Sesion iniciada";
}


$rtt = $_SESSION['username'];
//echo $rtt;
$names = $_SESSION['firstname'];
$regimen = $_SESSION['regimen'];
////echo $regimen;
$inicio = $_SESSION['configurando'];
*/







///// CONFIGURACIN INICIAL/
/*
if ($inicio == 0) {

  ?>
  <SCRIPT LANGUAGE="JavaScript">
function redireccionar() {
setTimeout("location.href='configuracion/'");
}
window.onload = redireccionar;


</SCRIPT>



  <?php
} else {
  //echo "Sesion iniciada";
}

*/


/*

$perfil_usuario =  $_SESSION['perfil'];
$regimen2 =  $_SESSION['regimen'];



$restaurante2 =  $_SESSION['cajero'];
$cajero_lector =  $_SESSION['cajero_lector'];
$cajero_imagenes =  $_SESSION['cajero_imagenes'];
$usuario_ordenes_servicio =  $_SESSION['usuario_orden_servicio'];
$cajero_parqueadero =  $_SESSION['cajero_parqueadero'];
$cuenta_autoservicio_parqueadero =  $_SESSION['cuenta_autoservicio_parqueadero'];
$pos_normal =  $_SESSION['pos_normal'];

*/


  include '../pos/footer2.php';


///// FIN PERFILES FOOTER
?>


<?php
 //* ACTIVAR SESION VALIDACION
 /*

 switch(true)  {

case ($rtt==0):

  ?>


<SCRIPT LANGUAGE="JavaScript">
							function redireccionar() {
							setTimeout("location.href='../login/'");
							}
							window.onload = redireccionar;

							</SCRIPT>

<?php
 }
 
*/

date_default_timezone_set('America/Bogota');
$f1 = date("Y/m/d");
//$f1 = "2017/05/14";


///$f2 = $_SESSION['plan_vence'];
function diff_dte($date1, $date2){
       if (!is_integer($date1)) $date1 = strtotime($date1);
       if (!is_integer($date2)) $date2 = strtotime($date2);  
       return floor(abs($date1 - $date2) / 60 / 60 / 24);
} 


//$dias = diff_dte($f1,$f2);
?>



<meta name="author" content="Adrian Monsalve">
   <!--  -->




<link rel="apple-touch-icon-precomposed" href="icon.png"/>




  <link href="./bootstrap.min.css" rel="stylesheet">
    <link href="./estilos3.css" rel="stylesheet">
    <link href="./stylos.css" rel="stylesheet">



  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
  <link rel=icon href='http://facturoe.com/icon.png' sizes="32x32" type="image/png">






 <!--


 -->
  </head>

<?php

include '../pos/header.php';
?>


  <!--script calendario-->


<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />


<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->


<!-- ... -->
  <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />



<body>


<!--barra navegacion-->







<!--fin barra navegacion-->

    <div class="container">
      <div class="row-fluid">

<h5></span> <?php

//$names = $_SESSION['firstname'];

//echo $names ; echo "<br>Perfil : "; 






?>  </h5>




 <!--LICIENCIA CONCEDIDIA A;;-->
<h5><?php

/*

define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME22", "facturoe_usuarios");//Nombre de la base de datos
define("DB_USER", "facturoe_Dios");//Usuario de tu base de datos
define("DB_PASS", "lPsTV4bjzBzz");//Contraseña del usuario de la base de datos
$conxx = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME22);





$perfil2pp    = mysqli_query($conxx, "select * from registrados WHERE username ='$xx' ORDER by id ASC LIMIT 1");
$rw_perfil2pp = mysqli_fetch_array($perfil2pp);


echo "LICENCIA: ";echo $rw_perfil2pp['firstname'];

*/
?></h5>


<h4></span> Nueva Orden de Servicio</h4>

<hr>

<div style="width:40em; text-align: right;  "  >
 
 
<button type="button" class="btn btn-sample" class="btn pull-right" data-toggle="modal" data-target="#dataRegister"><i class=''></i>Nuevo Cliente</button>
       
<button type="button"   class="btn btn-sample" class="btn pull-right" data-toggle="modal" data-target="#myModalayuda"><i class=''></i>Seleccionar Cliente</button>

     
       
       
<button type="button"   class="btn btn-sample" class="btn pull-right" data-toggle="modal" data-target="#dataRegister9"><i class=''></i>Datos del Equipo</button>

<button class="btn btn-sample"  onclick="NewTab()">
        Crear Orden de Servicio
    </button>

<br>
</div>
<h4>Datos Cliente: </h4>

<div class="clientecarga"  ></div>
<div class="pagaconcarga1"  ></div>



           
            
          <div  style="heigth:400px  " id="resultados"  class="col-md-6" style="border: 5px solid #315285 ; border-radius:5px  "   >


          </div><!--CARGA EL LISTADO DE ITEMS AGREGADOS A A FACTURA -->
          
          <div class="outer_div"   ></div>
            
        

<!-- AQUI LLAMO A LA FUNCION DE ABAJO DE LA VENTANA MODAL -->


     



      <!--FIN VENTANA MODAL-->



<!-- VANTANA MODAL AYUDA-->

<div class="col-md-12"  style="border-bottom: 7em solid white"  >
<br>

    <script>
        function NewTab() {
            window.open("print.php?id=1",
                "", "width=600, height=600");
        }
    </script>










</div>

<div style="  " >

</div>

      <div class="modal fade bs-example-modal-lg" id="myModalayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>



          <h3>Lista de Clientes</h3>
  </div>
          <div class="outer_clientes" >
        
<div></div>

           </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>



          




      <!--ayuda2-->

      <div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">



          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>



          <h3>Elaborar una nueva factusasdajdghskagfda.</h3>
  </div>
          <div class="modal-body">
        
<h5>1. Agregar Cliente:<h5><h5>Para esto hacemos clic en "Nuevo Cliente". Si tenemos el cliente ya regsitrado en el sistema, solo tenemos que ir al siguiente campo "Buscar Cliente", ingresamos las primeras letras del nombre del cliente y tendremos una busqueda rapida y asi seleccionar el cliente buscado. </h5>
<div></div>

<h5>2. Aplica Retención:<h5> <h5>Seleccionamos si aplicamos retención en la fuente según sea el caso.</h5>

<h5>3. Descuento Factura:<h5><h5>Solo lo llenamos en caso de quereamos hacer un descuento en el Sub-Total de la factura.</h5>

<h5>4. Observaciones:</h5> <h5>podemos ingresar nota dirigida al cliente.</h5>

<h5>5. Forma de Pago:<h5> <h5>Aquí tenemos multipes opciones de pago a elegir.</h5>
<h5>6. Fecha Vencimiento.</h5> <h5>Al realizar clic se desplega un calendario donde podemos seleccionar la fecha de vencimiento de la factura. Esta factura automaticamente ingresa a cuentas por cobrar.</h5>
<h5>4. Agregar Productos:</h5><h5> Al presionar este boton se nos abre una ventana donde encontraremos una lista de todos los productos del inventario.</h5>

<h5>En esta ventana contamos con un buscador de productos, podemos modificar el precio de venta, tambien podemos modificar la cantidad de unidades. finalmente damos clic en "Agregar" y tendremos el producto en la factura.</h5>




<dir></dir>

           </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>





      <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Cabecera de la ventana</h3>
     </div>
         <div class="modal-body">
            <h4>Texto de la ventana</h4>
            Mas texto en la ventana.    
     </div>
         <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
     </div>
      </div>
   </div>
</div>
      
      <!-- VANTANA MODAL INICIO CONFIGURACION-->


     

      <div class="modal fade bs-example-modal-lg" id="myModalinicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">PRIMEROS PASOS</h4>
          <h5 class="modal-title" id="myModalLabel">Configuración de tu cuenta</h5>

          </div>
          <div class="modal-body">
          <form class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-6">
              <input type="text" class="form-control" id="q" placeholder="Ingresa la pregunta AQUI" onkeyup="load(1)">
            </div>

            </div>
          </form>
          <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->


<!-- AQUI LLAMO A LA FUNCION DE ABAJO DE LA VENTANA MODAL -->


          <div class="outer_div" ></div>


          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>
        </div>
        </div>
      </div>


      <!--FIN VENTANA MODAL-->




      </div>
     </div>
  </div>



<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!--
SCRIPTS CALENDARIO
Include Date Range Picker -->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function () {
$("#fecha").datepicker();
});

 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
$("#fecha").datepicker();
});
</script>





<!--
FIN CALENDARIO


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/VentanaCentrada.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  <script>




////FUNCION VENTANA modal
    $(document).ready(function(){
      load(1);
    });

 



    function load(page){
      var q= $("#q").val();
      var parametros={"action":"ajax","page":page,"q":q};
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./ajax/buscador_items_041118.php',
        data: parametros,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $(".outer_div").html(data).fadeIn('slow');
          $('#loader').html('');

        }
      })
    }



//setTimeout(load, 3000);
setInterval(load, 5000);

    $(document).ready(function(){
      loadpagacon(1);
    });

    
    function loadpagacon(page){
      var q= $("#q22").val();
      var parametros={"action":"ajax","page":page,"q":q};
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./ajax/buscador_pagacon.php',
        data: parametros,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $(".outer_pagacon").html(data).fadeIn('slow');
          $('#loader').html('');

        }
      })
    }



    $(document).ready(function(){
      loadclientes(1);
    });

    
    function loadclientes(page){
      var q= $("#q22").val();
      var parametros={"action":"ajax","page":page,"q":q};
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./ajax/buscador_clientes.php',
        data: parametros,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $(".outer_clientes").html(data).fadeIn('slow');
          $('#loader').html('');

        }
      })
    }

    $(document).ready(function(){
      clientesload(1);
    })
    function clientesload(page){
      var q= $("#q").val();
      var parametros={"action":"ajax","page":page,"q":q};
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./ajax/clientesver.php',
        data: parametros,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $(".clientecarga").html(data).fadeIn('slow');
          $('#loader').html('');
          clientesload();
          ////$('#dataRegister').modal('hide');
          

        }
      })
    }

    $(document).ready(function(){
      pagaconload(1);
    })
    function pagaconload(page){
      var q= $("#q").val();
      var parametros={"action":"ajax","page":page,"q":q};
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'./ajax/pagaconver.php',
        data: parametros,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
        },
        success:function(data){
          $(".pagaconcarga").html(data).fadeIn('slow');
          $('#loader').html('');
          pagaconload();
          ////$('#dataRegister').modal('hide');
          

        }
      })
    }

  </script>






  <script>
   $(document).ready(function(){
      agregar(1);
    });
  function agregar (id)
    {
      var prec=$('#prec_'+id).val();
      var cantidad=$('#cantidad_'+id).val();
      var codigo=$('#codigo_'+id).val();
      var articulo=$('#articulo_'+id).val();
      var descuentoproducto=$('#descuentoproducto_'+id).val();


      //Inicia validacion /* if (isNaN(cantidad)) {alert('Error a'); document.getElementById('cantidad_'+id).focus(); return false; } if (isNaN(precio_venta)) {alert('Error b'); document.getElementById('precio_venta_'+id).focus(); return false; } */
      //Fin validacion

    var parametros={"id":id,"prec":prec,"cantidad":cantidad,"codigo":codigo,"articulo":articulo,"descuentoproducto":descuentoproducto};
    $.ajax({
        type: "POST",
        url: "./ajax/agregar_items_041118.php",
        data: parametros,
     beforeSend: function(objeto){
      $("#resultados").html("Agregando....");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });
    }









    $(document).ready(function(){
      agregarCliente(1);
    });
  function agregarCliente (id)
    {
      var prec2=$('#prec2_'+id).val();
      var cantidad2=$('#cantidad2_'+id).val();
      var codigo=$('#codigo_'+id).val();
      var articulo=$('#articulo_'+id).val();
      var descuentoproducto=$('#descuentoproducto_'+id).val();
      var telefono=$('#telefono_'+id).val();
      var prec88=$('#prec88_'+id).val();


      //Inicia validacion /* if (isNaN(cantidad2)) {alert('Error a'); document.getElementById('cantidad2_'+id).focus(); return false; } if (isNaN(prec2io_venta)) {alert('Error b'); document.getElementById('prec2io_venta_'+id).focus(); return false; } */
      //Fin validacion

    var parametros={"id":id,"prec2":prec2,"cantidad2":cantidad2,"codigo":codigo,"articulo":articulo,"descuentoproducto":descuentoproducto,"telefono":telefono,"prec88":prec88};
    $.ajax({
        type: "POST",
        url: "./ajax/agregar_clientes.php",
        data: parametros,
     beforeSend: function(objeto){
      $("#resultados2").html("Agregando a comprobante....");
      },
        success: function(datos){
    $("#resultados2").html(datos);
    }
      });
    }






    $(document).ready(function(){
      agregarPagaCon(1);
    });
  function agregarPagaCon (id)
    {
      var prec2=$('#prec2_'+id).val();
      var cantidad2=$('#cantidad2_'+id).val();
      var codigo=$('#codigo_'+id).val();
      var articulo=$('#articulo_'+id).val();
      var descuentoproducto=$('#descuentoproducto_'+id).val();


      //Inicia validacion /* if (isNaN(cantidad2)) {alert('Error a'); document.getElementById('cantidad2_'+id).focus(); return false; } if (isNaN(prec2io_venta)) {alert('Error b'); document.getElementById('prec2io_venta_'+id).focus(); return false; } */
      //Fin validacion

    var parametros={"id":id,"prec2":prec2,"cantidad2":cantidad2,"codigo":codigo,"articulo":articulo,"descuentoproducto":descuentoproducto};
    $.ajax({
        type: "POST",
        url: "./ajax/agregar_pagacon.php",
        data: parametros,
     beforeSend: function(objeto){
      $("#resultadosPagaCon").html("Agregando a Cotización....");
      },
        success: function(datos){
    $("#resultadosPagaCon").html(datos);

    agregar();
    
    }
      });
    }









      function eliminar (id)
    {

      $.ajax({
        type: "GET",
        url: "./ajax/agregar_items_041118.php",
        data: "id="+id,
     beforeSend: function(objeto){
      $("#resultados").html("Eliminando Item...");
      },
        success: function(datos){
    $("#resultados").html(datos);
    }
      });

    }

    $("#datos_pedido").submit(function(){
      var proveedor = $("#proveedor").val();
      var retension = $("#retension").val();
      var fecha = $("#fecha").val();
      var tipo_retension = $("#tipo_retension").val();
      var descuento = $("#descuento").val();
      var forma_pago = $("#forma_pago").val();
      var observaciones = $("#observaciones").val();
      var texto = $("#texto").val();
      var pagar_en = $("#pagar_en").val();
      
      if (proveedor>0)
     {
      VentanaCentrada('../pdf/documentos/cotizacion_210219_pdf.php?proveedor='+proveedor+'&retension='+retension+'&fecha='+fecha+'&tipo_retension='+tipo_retension+'&forma_pago='+forma_pago+'&pagar_en='+pagar_en+'&texto='+texto+'&descuento='+descuento+'&observaciones='+observaciones,'Pedido','','1024','768','true');
     } else {
       alert("Selecciona el proveedor");
       return false;
     }

    });
  </script>


<script type="text/javascript">
$(document).ready(function() {
    $( ".proveedor" ).select2({
    ajax: {
        url: "ajax/clientes2.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search 
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 2
});
});


$( "#guardarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "agregar_cliente.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
//////



$( "#guardarDatos9" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "agregar_equipo.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					agregar();
				  }
			});
		  event.preventDefault();
		});
//////




////




</script>




<!--EJECUTA VENTANA MODAL DE INICIO

<script>
   $(document).ready(function()
   {
      $("#myModalinicio").modal("show");
   });
</script>
-->



  </body>
</html>
<?php include ("modal_agregar2.php");?>


<!--ZENDEX Y GOOGLE ANALITICS////-->

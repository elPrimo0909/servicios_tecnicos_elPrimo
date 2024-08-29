<?php
/*-----------------------
Adrian Monsalve
--*/
	# conectare la base de datos
   ob_start();
session_start();

///print_r($_SESSION);




define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//
	# conectare la base de datos
  $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['id_pais'])){
			$errors[] = "ID vacío";
		}   else if (
			!empty($_POST['id_pais']) 
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_pais=intval($_POST['id_pais']);
		
		$sql="DELETE FROM clientes2 WHERE id='".$id_pais."'";
		$query_delete = mysqli_query($con,$sql);
			if ($query_delete){
				$messages[] = "El cliente se elimino correctamente.";
			} else{
				$errors []= "Hubo en error, envia un ticket a nuestro centro de soporte.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido, envia un ticket a nuestro centro de soporte";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-info" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Actualizado el sistema!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>	
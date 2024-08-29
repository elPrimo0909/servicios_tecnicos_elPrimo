<?php
error_reporting(0);

$msg = "";





 $imagen1= $_GET['id'];

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./imagenes/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "datos_servicios");

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (db,nombre) VALUES ('$imagen1','$filename') ";
	//$sql        = "UPDATE lista7 SET logo='".$filename."' WHERE id='".$imagen1."'";
    //$sql = "UPDATE lista7 (imagen) VALUES ('$filename') WHERE id = '924' ";

    // Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Logo guardado!</h3>";

            ?>
            <SCRIPT LANGUAGE="JavaScript">
        function redireccionar() {
        setTimeout("location.href='../inventario_f'");
        }
        window.onload = redireccionar;
        
        
        </SCRIPT>
<?php        

	} else {
		echo "<h3> Fallo carga logo!</h3>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body  >



	<div id="content" class="form-group" style="text-align: center;"  >
		<form method="POST" action=""  class="form-class" enctype="multipart/form-data">
			<div class="form-group"><br>
            <?php

define("DB_HOST", "localhost");//DB_HOST:  generalmente suele ser "127.0.0.1"
define("DB_NAME", "datos_servicios");//Nombre de la base de datos
define("DB_USER", "root");//Usuario de tu base de datos
define("DB_PASS", "");//Contraseña del usuario de la base de datos
$con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$count_query = mysqli_query($con, "SELECT * FROM image WHERE db=$imagen1 order by id DESC ");
$row         = mysqli_fetch_array($count_query);
 $im1     = $row['nombre'];

if(isset($im1)){
?>
Imagen Actual<br>
<img src="./imagenes/<?php echo  $im1  ?>" width="300"><br><br><br>
<?php

}



?>   
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>


            
<div style="border:100px" >Selecciona una imagen para este producto
</div>
<label class="btn btn-primary">
<i class="fa fa-image"></i> Seleccionar Imagen<input type="file" style="display: none;" name="uploadfile">
</label>		
			</div>
			<div class="form-group">
			<button class="btn btn-primary" type="submit" name="upload">Grabar</button>
	
			</div>
		</form>
		<a  href="../inventario_f" >
		<button class="btn btn-primary">Regresar</button>
		</a>
	</div>
   


	
</body>

</html>

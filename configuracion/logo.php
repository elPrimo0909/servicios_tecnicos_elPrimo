<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./uploads/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "datos_pos");

	// Get all the submitted data from the form
	$sql = "INSERT INTO configuracion (logo) VALUES ('$filename') ";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Logo guardado!</h3>";

            ?>
            <SCRIPT LANGUAGE="JavaScript">
        function redireccionar() {
        setTimeout("location.href='../configuracion'");
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

<head>
	<title>Subir logo</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="content" class="form-group" style="text-align: center;"  >
		<form method="POST" action=""  class="form-class" enctype="multipart/form-data">
			<div class="form-group"><br>

			<link href="../pos/bootstrap.min.css" rel="stylesheet">
    <link href="../pos/estilos3.css" rel="stylesheet">
     <hr>       
<div style="border:100px" >  <h3>Carga tu Logo</h3>Consejo: preferiblemente imagenes png con una dimension pequeña.
</div><br>
<label class="btn btn-primary">
<i class="fa fa-image"></i> Seleccionar Imagen<input type="file" style="display: none;" name="uploadfile">
</label>			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">Grabar</button>
			</div>
		</form>
		<a  href="../configuracion" >
		<button class="btn btn-primary">Regresar</button>
		</a>
	</div>



	<div id="display-image">
		<?php
		$query = " select * from image ";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./image/<?php echo $data['filename']; ?>">

		<?php
		}
		?>
	</div>
</body>

</html>

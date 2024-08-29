<?php
// MySQL database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datos";

// Make connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection and throw error if not available
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an image file was uploaded
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    print_r($_FILES);
    $image = $_FILES['image']['tmp_name'];
    $imgContent = file_get_contents($image);

    // Insert image data into database as BLOB
    $sql = "INSERT INTO configuracion (logo) VALUES(?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $imgContent);
    $current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());


    if ($current_id) {
        echo "Logo guardado.";
    } else {
        echo "Logo fallo, reintenta mas tarde.";
    }
} else {
    echo "Selecciona una imagen logo.";
}

// Close the database connection
$conn->close();

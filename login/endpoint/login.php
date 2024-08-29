<?php
session_start(); 
include ('../conn/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT `password` FROM `tbl_user` WHERE `username` = :username");
    $stmt->bindParam(':username', $username );
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $stored_password = $row['password'];

        if ($password === $stored_password) {
            $_SESSION["user"] = $username; 
            ///$_SESSION["nivel"] = $nivel; 
            echo "
            <script>
                /*alert('Login Successfully!');*/
                window.location.href = 'http://localhost//SM-SERVICIOS-TECNICOS/pos/';
            </script>
            "; 
        } else {
            echo "
            <script>
                /*alert('Login Failed, Incorrect Password!');*/
                window.location.href = 'http://localhost//SM-SERVICIOS-TECNICOS/login/';
            </script>
            ";
        }
    } else {
        echo "
            <script>
               alert('Usuario o Contraseña Invalida!'); 
                window.location.href = 'http://localhost//SM-SERVICIOS-TECNICOS/login/';
            </script>
            ";
    }
}

?>
<?php include ('./conn/conn.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM-POS</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/style2.css">

    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

.main {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: white;
    height: 100vh;
}

.login,
.registration {
    border: 2px solid;
    border-radius: 20px;
    margin: 10px;
    padding: 50px;
    width: 500px;
    max-width: 500px;
    background-color: rgb(240, 240, 240);
}

.login-form,
.registration-form {
    margin-top: 30px;
}

.registrationForm {
    font-size: 13px;
    margin-top: -15px;
    color: blue;
    text-decoration: underline;
    text-align: center;
    cursor: pointer;
}

.content {
    border: 2px solid;
    border-radius: 10px;
    background-color: rgb(240, 240, 240);
    padding: 20px;
    width: 95%px;
    height: 500px;
    margin-top: -50px;
}

#editBtn,
#deleteBtn {
    font-size: 20px;
    width: 30px;
}
    </style>

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body  >
    
    <div class="main" style="background-color:#0ea947;"  >

    <div style=" padding:100px "  >
        
    <img src="../pos/img/logo_010419.png" width="310" height="60">

</div>

        <!-- Login Area -->
        <div class="login" id="loginForm">
            <h1 class="text-center">Ingreso a Sistema</h1>
            <div class="login-form">
                <form action="./endpoint/login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                     <button type="submit" style="background-color:#0ea947; color:white  "  class=" login-btn form-control">Ingresar</button>
                </form>
            </div>
        </div>


        <!-- Registration Area -->
        <div class="registration" id="registrationForm">
            <h1 class="text-center">Registration Form</h1>
            <div class="registration-form">
            <form action="./endpoint/add-user.php" method="POST">
                <div class="form-group row">
                    <div class="col-6">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="first_name">
                    </div>
                    <div class="col-6">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="last_name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-5">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="number" class="form-control" id="contactNumber" name="contact_number" maxlength="11">
                    </div>
                    <div class="col-7">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="registerUsername">Username:</label>
                    <input type="text" class="form-control" id="registerUsername" name="username">
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password:</label>
                    <input type="password" class="form-control" id="registerPassword" name="password">
                </div>
                <p class="registrationForm" onclick="showLoginForm()"><- Back</p>
                <button type="submit" class="btn btn-dark login-register form-control">Register</button>
            </form>

            </div>

        </div>

    </div>

    <script>
        // Constant variables
        const loginForm = document.getElementById('loginForm');
        const registrationForm = document.getElementById('registrationForm');

        // Hide registration form
        registrationForm.style.display = "none";


        function showRegistrationForm() {
            registrationForm.style.display = "";
            loginForm.style.display = "none";
        }

        function showLoginForm() {
            registrationForm.style.display = "none";
            loginForm.style.display = "";
        }

    </script>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php

    include 'phpconfig/custRegisterLogin.php';

    session_start();

    if (isset($_POST['submit'])) {
        $custID = $_POST['custID'];
        $custName = $_POST['custName'];
        $custAddress = $_POST['custAddress'];
        $custPhoneNo = $_POST['custPhoneNo'];
        $custEmail = $_POST['custEmail'];
        $custPassword = $_POST['custPassword'];

        //MySQL query that look up for email that similar that have been entered in the form
        $sql = "SELECT * FROM customer WHERE custEmail = '$custEmail'";
        $result = mysqli_query($con, $sql);

        //if-else operation that verifies the entered email either exists or not
        if (!$result->num_rows > 0){
            $query = "INSERT INTO customer (custID, custName, custAddress, custPhoneNo, custEmail, custPassword)
                  VALUES ('$custID', '$custName', '$custAddress', '$custPhoneNo', '$custEmail', '$custPassword')";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Customer Registration Completed.')</script>";
            } else {
                echo "<script>alert('Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Email entered already exists.')</script>";
        }

    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Eats and Treats Cake Shop Booking System</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/canito-detalle-producto.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/Lista-Productos-Canito.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team-Clean.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean">
        <div class="container"><a class="navbar-brand" href="index.php"><strong>Eats and Treats Cake Shop</strong><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="customerLogIn.php">Customer<br></a></li>
                    <li class="nav-item"><a class="nav-link" href="adminLogIn.php">Administator<br></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="register-photo" style="background: rgb(255,255,255);height: 710px;">
        <div class="form-container">
            <form method="POST" action = "customerSignUp.php">
                <h2 class="text-center"><strong>Create</strong> new account for Customer.</h2>
                <div class="mb-3"><input class="form-control" type="text" placeholder="Customer ID" name="custID" required></div>
                <div class="mb-3"><input class="form-control" type="text" placeholder="Name" name="custName" required></div>
                <div class="mb-3"><textarea class="form-control" placeholder="Address" name="custAddress" required></textarea></div>
                <div class="mb-3"><input class="form-control" type="tel" placeholder="Phone Number" name="custPhoneNo" required></div>
                <div class="mb-3"><input class="form-control" type="email" placeholder="Email" name="custEmail" required></div>
                <div class="mb-3"><input class="form-control" type="password" placeholder="Password" name="custPassword" required></div>
                <div class="mb-3">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name = "check" required>I agree to the license terms.</label></div>
                </div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" input type="submit" name = "submit" value = "submit" style="background: rgb(86,198,198);">Sign Up</button></div><a class="already" href="customerLogIn.php">You already have an account? Login here.</a>
            </form>
        </div>
    </section>
    <footer class="footer-basic">
        <ul class="list-inline">
            <li class="list-inline-item"></li>
            <li class="list-inline-item"><a href="team.html">Team</a></li>
            <li class="list-inline-item"><a href="about.html">About</a></li>
            <li class="list-inline-item"><a href="terms.html">Terms</a></li>
            <li class="list-inline-item"><a href="privacyPolicy.html">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Eats and Treats Cake © 2021</p>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="assets/js/DataTable---Fully-BSS-Editable.js"></script>
    <script src="assets/js/Animated-Pretty-Product-List-v12.js"></script>
</body>

</html>

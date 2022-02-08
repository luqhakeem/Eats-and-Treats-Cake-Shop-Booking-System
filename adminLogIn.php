<?php

    include 'phpconfig/adminRegisterLogin.php';

    session_start();

    error_reporting(0);

    if (isset($_POST['submit'])) {
        $adminID = $_POST['adminID'];
        $adminPassword = $_POST['adminPassword'];

        $sql = "SELECT * FROM admin WHERE adminID = '$adminID' AND adminPassword = '$adminPassword'";
        $result = mysqli_query($con, $sql);

        if ($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['adminID'] = $row['adminID'];
            header("Location: adminHome.php");
        } else {
            echo "<script>alert('ID or Password entered is Wrong.')</script>";
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
                    <li class="nav-item"><a class="nav-link" href="customerLogIn.php">Customer<br></a></li>
                    <li class="nav-item"><a class="nav-link active" href="adminLogIn.php">Administator<br></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="login-clean" style="background: rgb(255,255,255);height: 710px;">
        <form method="post" style="background: rgb(255, 255, 255);">
            <h2 class="visually-hidden">Login Form</h2>
            <div class="illustration"><i class="icon ion-gear-a" style="color: rgb(86,198,198);"></i></div>
            <div class="mb-3"><input class="form-control" type="text" placeholder="Administator ID" name="adminID" required></div>
            <div class="mb-3"><input class="form-control" type="password" name="adminPassword" placeholder="Password" required></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name = "submit" style="background: rgb(86,198,198);">Log In</button></div><a class="forgot" href="adminSignUp.php">Create new account here.</a>
        </form>
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

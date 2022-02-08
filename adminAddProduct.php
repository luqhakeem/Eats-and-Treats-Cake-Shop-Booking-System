<?php

    include 'phpconfig/cake.php';

    if (isset($_POST['save'])) {
        $cakeID = $_POST['cakeID'];
        $cakeName = $_POST['cakeName'];
        $cakeDesc = $_POST['cakeDesc'];
        $cakeDetail = $_POST['cakeDetail'];
        $cakePrice = $_POST['cakePrice'];
        $cakeImage = $_FILES['cakeImage']['name'];
        $cakeImage_tmp = $_FILES['cakeImage']['tmp_name'];

        $check = "SELECT * FROM cakeproduct WHERE cakeID = '$cakeID'";
        $result_check = mysqli_query($con, $check);

        if (!$result_check->num_rows > 0){

            move_uploaded_file($cakeImage_tmp, "assets/img/$cakeImage");

            $query = "INSERT INTO cakeproduct (cakeID, cakeName, cakeDesc, cakeDetail, cakePrice, cakeImage)
                  VALUES ('$cakeID', '$cakeName', '$cakeDesc', '$cakeDetail', '$cakePrice', '$cakeImage')";

            $result = mysqli_query($con, $query);

            if ($result) {
                echo "<script>alert('Product added successfully.')</script>";
            } else {
            echo "<script>alert('Failed to add product.')</script>";
            }
        } else {
            echo "<script>alert('Cake ID entered already exists.')</script>";
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
        <div class="container"><a class="navbar-brand" href="adminHome.php"><strong>Eats and Treats Cake Shop</strong><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="logout.php">Log Out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="register-photo" style="background: rgb(255,255,255);height: 710px;">
        <div class="form-container">
            <form method="post" enctype="multipart/form-data">
                <h2 class="text-center"><strong>Add Cake</strong></h2>
                <div class="mb-3"><input class="form-control" type="text" style="width: 780px;height: 40px;" placeholder="Cake ID" name="cakeID" id="cakeID" required></div>
                <div class="mb-3"><input class="form-control" type="text" style="width: 780px;height: 40px;" placeholder="Cake Name" name="cakeName" id="cakeName" required></div>
                <div class="mb-3"><textarea class="form-control" placeholder="Description" type="text" name="cakeDesc" required></textarea></div>
                <div class="mb-3"><textarea class="form-control" placeholder="Details" type="text" name="cakeDetail" required></textarea></div>
                <div class="mb-3"><input class="form-control" type="text" style="width: 780px;height: 40px;" placeholder="Price" name="cakePrice" id="cakePrice" required></div>
                <div class="mb-3"><input class="form-control" type="file" name="cakeImage" id="cakeImage" required></div>
                <div class="mb-3"><button class="btn btn-primary d-block w-100" role="button" type= "submit" name="save" id="save" style="background: rgb(86,198,198);"><i class="fa fa-save" style="font-size: 16px;"></i><strong>&nbsp; Save</strong></button></div>
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

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
    <link rel="stylesheet" href="assets/css/Article.css">
    <link rel="stylesheet" href="assets/css/Footer.css">
    <link rel="stylesheet" href="assets/css/Highlight.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/ListTableProduct.css">
    <link rel="stylesheet" href="assets/css/Login.css">
    <link rel="stylesheet" href="assets/css/Navigation.css">
    <link rel="stylesheet" href="assets/css/ProductDetail.css">
    <link rel="stylesheet" href="assets/css/ProductList.css">
    <link rel="stylesheet" href="assets/css/Registration.css">
    <link rel="stylesheet" href="assets/css/Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Team.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean">
        <div class="container"><a class="navbar-brand" href="adminHome.php"><strong>Eats and Treats Cake Shop</strong><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="adminHome.php">Home</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="logout.php">Log Out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row product-list dev">
            <div class="col-sm-6 col-md-4 offset-xl-4 product-item animation-element slide-fade-xslow">
                <div class="product-container">
                    <div class="row">
                        <div class="col-md-12"><a class="product-image" href="adminAddProduct.php"><i class="icon ion-plus-round" style="color: rgb(86,198,198);font-size: 66px;"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row product-list dev">

            <?php

            include 'phpconfig/cake.php';

            $sql = "SELECT * FROM cakeproduct";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cakeID = $row["cakeID"];
                        $cakeName = $row["cakeName"];
                        $cakeDesc = $row["cakeDesc"];
                        $cakeDetail = $row["cakeDetail"];
                        $cakePrice = $row["cakePrice"];
                        $cakeImage = $row["cakeImage"];
                        $cakeImage_src = "assets/img/".$cakeImage;

     echo '       <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">
                <div class="product-container">
                    <div class="row">
                        <div class="col-md-12"><a class="product-image"><img src="'.$cakeImage_src.'"></a></div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <h2><a><strong>'.$cakeName.'</strong></a></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="product-description">'.$cakeDesc.'</p>
                                <p class="product-price" style="text-align: center;">RM '.$cakePrice.'</p>
                            <div class="row">
                                <div class="col-6 col-xxl-2"><a href="adminEditProduct.php?cakeID='.$cakeID.'"><i class="icon ion-edit" style="color: rgb(86,198,198);font-size: 30px;"></i></a></div>
                                <div class="col-6 col-xxl-2 offset-xxl-8"><a href="deleteProduct.php?cakeID='.$cakeID.'"><i class="icon ion-ios-trash" style="color: rgb(86,198,198);font-size: 30px;"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
            ?>
        </div>
    </div>
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
    <script src="assets/js/DataTable.js"></script>
    <script src="assets/js/ProductList.js"></script>
</body>

</html>

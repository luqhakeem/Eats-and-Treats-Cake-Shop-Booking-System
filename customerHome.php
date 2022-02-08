<?php

include 'phpconfig/cake.php';

if(isset($_POST["add_to_cart"])){

    if(isset($_SESSION["shopping_cart"])){

        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id)){

            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(

                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"]
            );

            $_SESSION["shopping_cart"][$count] = $item_array;
        }

        else{

            echo '<script>alert("Item already added")</script>';
            echo '<script>window.location="customerHome.php"</script>';
        }

    }

    else{

        $item_array = array(

            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"]

        );

        $_SESSION["shopping_cart"][0] = $item_array;
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
        <div class="container"><a class="navbar-brand" href="customerHome.php"><strong>Eats and Treats Cake Shop</strong><br></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <form action = "search.php" method = "POST" class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center" style="padding-left: 172px;"><label class="form-label d-flex mb-0" for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" style="margin-left: 10px;"></div>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="customerHome.php">Home</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                        <div class="dropdown-menu"><a class="dropdown-item" href="logout.php">Log Out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header py-2">
                        <p style="font-size: 31px;"><strong>My Cart</strong></p>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive table mb-0 pt-3 pe-2">
                                <table class="table table-striped table-sm my-0 mydatatable">

                                        <tr>
                                            <th>Item ID</th>
                                            <th>Cake Name</th>
                                            <th> </th>
                                            <th>Status Item</th>
                                        </tr>


                                    <?php

                                    $total = 0;

                                        if(!empty($_SESSION["shopping_cart"])){



                                            foreach ($_SESSION["shopping_cart"] as $keys => $values){ ?>



                                                <tr>
                                                    <td><?php echo $values["item_id"]; ?></td>
                                                    <td><?php echo $values["item_name"]; ?></td>
                                                    <th> </th>
                                                    <td>RM <?php echo $values["item_price"]; ?></td>
                                                </tr>

                                                <?php

                                                    $total = $total + $values["item_price"];

                                                ?>
                                                <?php }

                                                ?>
                                            <?php }

                                            ?>



                                            <tr>
                                                <td style="text-align: center;"><br></td>
                                                <td style="text-align: center;"><br></td>
                                                <td style="text-align: right;font-weight: bold;">Subtotal :<br></td>
                                                <td>RM <?php echo number_format($total, 2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><br></td>
                                                <td style="text-align: center;"><br></td>
                                                <td style="text-align: right;font-weight: bold;">Shipping : <br></td>
                                                <td>RM 0.00</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><br></td>
                                                <td style="text-align: center;"><br></td>
                                                <td style="text-align: right;font-weight: bold;">Total : <br></td>
                                                <td>RM <?php echo number_format($total, 2); ?></td>
                                            </tr>
                                </table>
                        </div>
                    </div><a class="btn btn-danger btn-lg text-center center-block" role="button" href="customerComplate.php" style="background: rgb(86,198,198);"><i class="fa fa-arrow-circle-o-right"></i>&nbsp;Order</a>
                </div>
            </div>
        </div>
        <div class="row product-list dev">

            <?php
            $sql = "SELECT * FROM cakeproduct";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            $i=0;

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">
                    <form method="post" action="customerHome.php?action=add&id=<?php echo $row['cakeID']; ?>">

                                <div class="product-container">
                                    <div class="row">
                                        <div class="col-md-12"><a class="product-image"><img src="assets/img/<?php echo $row['cakeImage']; ?>"></a></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 col-xxl-12">
                                            <h2><a><strong><?php echo $row['cakeName']; ?></strong></a></h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="product-description"><?php echo $row['cakeDesc']; ?></p>
                                            <div class="row">
                                                <div class="col-6"><a class="btn btn-light" role="button" href="customerProductDetail.php?cakeID=<?php echo $row['cakeID']; ?>" style="background: rgb(86,198,198);color: rgb(255,255,255);font-size: 13px;"><strong>View</strong></a></div>
                                                <div class="col-6">
                                                    <input type="hidden" name="hidden_name" value="<?= $row['cakeName']; ?>">
                                                    <input type="hidden" name="hidden_price" value="<?= $row['cakePrice']; ?>">
                                                    <input type="submit" class="btn btn-light" name="add_to_cart" value="Add To Cart" style="background: rgb(86,198,198);color: rgb(255,255,255);font-size: 13px;"><br></div>
                                                <div class="col-6">
                                                    <p class="product-price" style="text-align: center;">RM <?php echo $row['cakePrice']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <?php
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
